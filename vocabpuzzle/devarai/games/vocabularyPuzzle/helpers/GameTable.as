package devarai.games.vocabularyPuzzle.helpers{
	import devarai.common.encryption.MD5;
	import devarai.common.ui.scrollbars.IScrollBar;
	import devarai.common.ui.scrollbars.VerticalScrollbar;
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.SecurityErrorEvent;
	import flash.events.TimerEvent;
	import flash.geom.Rectangle;
	import flash.media.Sound;
	import flash.net.SharedObject;
	import flash.net.URLLoader;
	import flash.net.URLLoaderDataFormat;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.utils.Timer;
	import flash.utils.escapeMultiByte;

	
	/**
	 * This class manages the in-game statistics and holds the words that got discovered.
	 */
	public class GameTable extends MovieClip implements IScrollBar{
		
		/**
		 * TextFields
		 */
		private var score:TextField;
		private var longestWord:TextField;
		private var bestScore:TextField;
		private var wordsList:TextField;
		
		
		/**
		 * Format
		 */
		private var tform:TextFormat = new TextFormat("Arial",15,0x111111,true);
		/**
		 * Real vars.
		 */
		private var theWords:Array = new Array();
		private var posis:Array = new Array();
		private var placedWords:Array = new Array();
		private var wordCounter:int = 0;
		private var scoreCounter:int = 0;
		private var theLength:int = 0;
		

		/**
		 * Holds a temporary score value which is counted up towards "scoreCounter".
		 */
		private var aktScore:int = 0;

		/**
		 * Masking the words textfield.
		 */
		private var maske:Sprite;
		/**
		 * Animation timer
		 */
		private var myTimer:Timer = new Timer(100);

		/**
		 * @return Relevant statistics.
		 */
		public function get stat():Array {
			return [scoreCounter,wordCounter];
		}
		/***
		 * Sound effects
		 */
		private var failSound:Sound = new FailSound();
		private var successSound:Success = new Success();
		
		/**
		 * Link to main class.
		 */
		private var _sc:VocabularyPuzzle;
		
		/**
		 * Holds locally stored results data.
		 */
		private var state:Array;
		private var mySharedObject:SharedObject;
		/**
		 * The scrollbar.
		 */
		private var scrollbarV:VerticalScrollbar;
		
		/**
		 * The width of the words field.
		 */
		private var myWidth:Number = 386;
		/**
		 * The height of the words field.
		 */
		private var myHeight:Number  = 77;
		
		/**
		 * Average length of successful words.
		 */
		private var avgLength:Number = 0;
		
		/**
		 * Constructor.
		 */
		public function GameTable(sc:VocabularyPuzzle) {
			
		
			myTimer.addEventListener(TimerEvent.TIMER, counter);
			
			_sc = sc;
			maske = this.getChildByName("maske_mc") as Sprite;
			
			score = this.getChildByName("score_txt") as TextField;
			longestWord = this.getChildByName("longestWord_txt") as TextField;
			bestScore = this.getChildByName("scoreBefore_txt") as TextField;
			wordsList = this.getChildByName("wordsList_txt") as TextField;
			
			
			wordsList.height = 777;
			
			wordsList.text = "";
			
			trace("0");

			
			score.text = "0";
			tform.size = 29;
			score.setTextFormat(tform);
			
			longestWord.text = "-";
			tform.size = 15;
			longestWord.setTextFormat(tform);
			
			var theid:String= "";
			
			for (var i:int = 0; i<sc.id.length; i++) {
				if (sc.id.charAt(i)!=" ") {
					theid+=sc.id.charAt(i);
				}
			}
			
			this.mySharedObject = SharedObject.getLocal("vp"+theid);
			//mySharedObject.data.state = null;
			
						
			var oldscore:int = -1;
			
			var arr:Array;
			
			
			trace("1");
			
			arr = mySharedObject.data.state as Array;
			state = arr;
			if (arr) {
				for (var i:int =0; i<arr[0].length; i++) {
					if (arr[0][i]==sc.theWord) {
						oldscore = Number(arr[1][i]);
						break;
					}
				}				
			} else {
				state = new Array();
				state.push(new Array());
				state.push(new Array());
			}

			trace("2");

			if (oldscore ==-1) {
				bestScore.text = "-";
			} else {
				bestScore.text = ""+oldscore;
			}
			tform.size = 15;
			bestScore.setTextFormat(tform);
			
			// Set up the scroll bars
			
			scrollbarV = new VerticalScrollbar(this,79);
			this.addChild(scrollbarV);
			scrollbarV.x = 378;
			scrollbarV.y = 32;
			
			
			scrollbarV.addEventListener("showScrollbar", showVScrollbar);
			scrollbarV.addEventListener("hideScrollbar", hideVScrollbar);
			
			
			this.wordsList.mask = maske;
			
			
			myTimer.start();
			
			this.dispatchEvent(new Event("cursorUpdate"));
			
			
			this.addEventListener(Event.ADDED_TO_STAGE, check);
		
		}

		private function check(evt:Event):void {
			this.checkWord("xyz");
		}
		
		/**
		 * Used for encryption.
		 */
		private var md5:MD5 = new MD5();

		/**
		 * Counts the temporary score counter up.
		 */
		private function counter(evt:Event):void {
			
			if (this.aktScore<this.scoreCounter) {
				this.aktScore++;
				this.refresh();
			}
			
		}
		
		/**
		 * Temporary vars for communicating with the backend.
		 */
		private var _inCheck:String;
		private var myLoader:URLLoader;
		
		/**
		 * Checks if a userword is okay and new
		 */
		public function checkWord(s:String):void {
			
			_inCheck = s.toUpperCase();
			
			if (!theWords[""+_inCheck+"9"] || s.toLowerCase() == "xyz") {
				
				
				
				trace("init request to server");
				
				// call back-end
				var myDate:Date = new Date();
				var timestamp:uint = myDate.getTime();
				if (myLoader) myLoader.close();
				myLoader = new URLLoader();
				myLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
			
				
				var cword:String = escapeMultiByte(String(s).toLowerCase());
				
				var t:String = tt+s.toLowerCase();
				
				var ti:String = md5.encrypt(t);
				
				
				var co:String = tt+"MD"+ti;
			  		
				
				
				var path:String = _sc.phpPath+"check.php?"+timestamp+"&word="+cword+"&lang="+escapeMultiByte(String(_sc.language[""+_sc.theWord]))+"&code="+co+"&time="+time;
				
				myLoader.addEventListener(Event.COMPLETE, onDataLoad);
				myLoader.addEventListener(IOErrorEvent.IO_ERROR, loaderError);
				myLoader.addEventListener(SecurityErrorEvent.SECURITY_ERROR, loaderError);
				myLoader.load(new URLRequest(path));
								
				trace(path+"\n");
				
					
			} else {
				_sc.searchTable.myInputLine.resume();
				failSound.play();
				highlightSame();
			}
			
		}
		
		private var redf:TextFormat = new TextFormat("Arial",15,0x990000,true);
		
		private function highlightSame():void {
			tform.bold = false;
			tform.size = 15;
			
			if (placedWords[""+_inCheck]) {
				this.wordsList.setTextFormat(tform);
				this.wordsList.setTextFormat(redf,posis[""+_inCheck],_inCheck.length+posis[""+_inCheck]);
				
				this.scrollPosV = wordsList.getCharBoundaries(posis[""+_inCheck]).y - this.pageHeight/2;
				this.dispatchEvent(new Event("cursorUpdate"));
			}
				
			
		}
		
		private var rep:int = 0;
		
		/**
		 * Error occured with the backend PHP.
		 */
		private function loaderError(evt:Event):void {
			
			if (rep>5) return;
			//_sc.searchTable.myInputLine.resume();
			this.checkWord(this._inCheck);
			rep++;
			
			
		} 
		
		public static var tt:String;
		public static var time:String = "non";
		/**
		 * This method is triggered after the PHP answered.
		 */
		private function onDataLoad(evt:Event){
			
			rep = 0;
			
			if (_inCheck.toLowerCase()=="xyz") {
				tt = evt.target.data["code"];
				
				var arr:Array = tt.split("-");
				time = arr[0];
				return;
			}
			
			trace("Server answered");
			
			if (theWords[""+_inCheck+"9"]) {
				
				highlightSame();
				_sc.searchTable.myInputLine.resume();
				failSound.play();
				return;
			}
			
			theWords[""+_inCheck+"9"] = true;
			
			var addy:int = 0;
			
			if (this.wordsList.length>0) addy+=2;
			posis[""+_inCheck] = this.wordsList.length+addy;
			
			//trace("judge value:"+evt.target.data["judge"]);
			if (evt.target.data["judge"] == "true") {
			
				
				trace("adding:"+_inCheck);
				

				if (wordCounter == 0) {
					
					this.wordsList.appendText(""+_inCheck);
					
				} else {
					this.wordsList.appendText("  "+_inCheck);
				}
				
				placedWords[""+_inCheck] = true;
				
				
				
				tform.bold = true;

				// Play found sound.
				this.theLength = Math.max(this.theLength, _inCheck.length);
				this.scoreCounter+=Math.round(_inCheck.length*1.5);
				
				avgLength +=_inCheck.length; 
				
				
				this.wordCounter++;
				
				var isIn:Boolean = false;
				
				for (var i:int =0; i<state[0].length; i++) {
					if (state[0][i]==_sc.theWord) {
						state[1][i] = Math.max(this.scoreCounter, state[1][i]);
						isIn = true;
						break;
					}
				}	
				
				if (!isIn) {
					state[0].push(_sc.theWord);
					state[1].push(this.scoreCounter);
				}
				
			
				this.scrollPosV = this.maxScrollPosV;
				this.refresh();
				this.dispatchEvent(new Event("cursorUpdate"));
				
				successSound.play();
				
				
			} else {
				failSound.play();
			}

			trace(this.wordsList.text);
			
			tform.bold = false;
			tform.size = 15;
			this.wordsList.setTextFormat(tform);
			_sc.searchTable.myInputLine.resume();
		}

		
		
		/**
		 * Refreshed the stats.
		 */
		private function refresh():void {
			

			
			score.text = ""+this.aktScore;
			tform.size = 29;
			tform.bold = true;
			score.setTextFormat(tform);
			
			longestWord.text = ""+this.theLength+" letters";;
			tform.size = 15;
			longestWord.setTextFormat(tform);
			
			var avl:Number = -1;
			
			if (avgLength >0) {
				avl = Math.round((this.avgLength/this.wordCounter)*10)/10;
				average_txt.text = ""+avl+" letters";
			} else {
				average_txt.text = "-";
			}
			
			
			average_txt.setTextFormat(tform);
			

		}
		
		/**
		 * Called if the game ended.
		 */
		public function finishPlay():void {
			
			this.mySharedObject.data.state = state;
			this.mySharedObject.flush();
			
		}
		/**
		 * Vertical scrollbar needed.
		 */
		private function showVScrollbar(evt:Event):void {
			
			this.wordsList.width = myWidth-6-10;
			maske.width = maske.width;
	
		}
		/**
		 * Vertical scrollbar can disappear.
		 */
		private function hideVScrollbar(evt:Event):void {
			this.wordsList.width = myWidth-3;
			maske.width = maske.width;
			
			
		}
		
		
		/**
		 * Scrolling tweens
		 */
		private var tw:Tween = null;
		
		/**
		 * @private
		 */
		public var newScrollPos:Number = 7;
		
		/**
		 * This method is relevant if we have more rows than height. So we have to scroll.
		 */
		
		/**
		 * This gives you the a vertical scroll position
		 * @return position
		 */		
		public function get scrollPosV():Number {
			return newScrollPos;
		};
		/**
		 * This sets a vertical scroll position
		 * @param n Position (>=0 and <=maxScrollPosV())
		 * @see IScrollBar#maxScrollPosV()
		 */
		public function set scrollPosV(n:Number):void {
			
			var rect:Rectangle = null;
			
			var i:int = wordsList.length-1;
			
			while (i>=0 && !rect) {
				rect = wordsList.getCharBoundaries(i);
				i--;
			}
			
			var maxPos:Number = 0;
			
			if (rect) {
				maxPos += rect.y + rect.height;				
			}

			if (tw) tw.stop();
			newScrollPos = Math.max(0,Math.min(n,maxPos));
			tw = new Tween(wordsList,"y",None.easeIn, wordsList.y,-newScrollPos+34,0.2,true);
			
		}
		/**		
		 * Gives you the maximum possible scroll position.
		 * @return Max. scroll position.
		 */
		public function get maxScrollPosV():Number {
			
			var rect:Rectangle = null;
			
			var i:int = wordsList.length-1;
		
			while (i>=0 && !rect) {
				rect = wordsList.getCharBoundaries(i);
				i--;
			}
			
			var maxPos:Number = 0;
			
			if (rect) {
				maxPos += rect.y + rect.height+3;				
			}
			return Math.max(maxPos-this.maske.height,0);
		}
		
		/**
		 * Scrolling page height in pixels.
		 */
		public function get pageHeight():Number {
			return this.maske.height;
		}	
		
	}
	
	
	
}