package devarai.games.vocabularyPuzzle {
	
	/**
	 * Vocabulary Puzzle Game V.1.0
	 * By DEVARAI 2011, Henning Devarai
	 * www.devarai.com 
	 * henning@devarai.com
	 */
	
	import devarai.common.ui.IContentElement;
	import devarai.games.vocabularyPuzzle.results.ResultsDialog;
	import devarai.games.vocabularyPuzzle.tools.ToolPanel;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.ContextMenuEvent;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.BlurFilter;
	import flash.filters.ColorMatrixFilter;
	import flash.geom.Matrix;
	import flash.media.Sound;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.navigateToURL;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.ui.ContextMenu;
	import flash.ui.ContextMenuItem;
	import flash.utils.Dictionary;
	import flash.xml.XMLDocument;
	

	/**
	 * This is the main class for the voc puzzle. It handles everything from loading the XML, creating the 
	 * table/grid and handling user interaction (through the associated classes).
	 */
	public class VocabularyPuzzle extends MovieClip {
		
		/**
		 * Entities used for loading and handling the external XML file with the puzzle parameters.
		 */
		private var _loader:URLLoader = new URLLoader();
		private var _request:URLRequest;
		private var _xml:XML = null;
		
		
		/**
		 * Getter for the loaded XML.
		 */
		public function get theXML():XML {
			return _xml;
		}
		
				
		/**
		 * This is a inner displayobject the puzzle takes place in.
		 */
		private var puzzleStage:MovieClip = new MovieClip();
		
		/**
		 * Says whether the players results have to be submitted to the backend
		 */
		private var _submitResults:Boolean = false;
	
		/**
		 * Displayobject to lay over the puzzle and fade dark
		 */
		private var fader:Sprite = new Sprite();

		/**
		 * Width of the whole puzzle in pixels.
		 */
		private var myWidth:Number;
		/**
		 * Height of the whole puzzle in pixels.
		 */
		private var myHeight:Number;
		/**
		 * Are we in exam mode ?
		 * 
		 */
		private var _exam:Boolean = false;
		
		/**
		 *  Used for calculating the score
		 */
		private var _timeWeight:Number = 0.5;
		/**
		 * A search table class for handling the search table.
		 * @see SearchTable
		 */
		private var _searchTable:SearchTable;
		/**
		 * Do we have a time limit and how much is ? No time limit = "0"
		 */
		private var _timeLimit:Number = 0;
		/**
		 * The tools like the timer
		 */
		private var tools:ToolPanel;
				
		/**
		 * The ID of the current puzzle
		 */
		private var _id:String;
		

		private var _words:Vector.<String>;
		
		/**
		 * Base words.
		 */
		public function get words():Vector.<String> {
			return this._words;
		}
		
		/**
		 * Links to the language of the base word.
		 */
		private var _language:Array = new Array();
		
		public function get language():Array {
			return this._language;
		}
		
		/**
		 * Is true whether a word is selected randomly to be player.
		 */
		private var _selectWordsRandomly:Boolean = true;
		
		public function get selectWordsRandomly():Boolean {
			return this._selectWordsRandomly;
		}
		
		/**
		 * This vector hold the words out of _words that ahve not been played yet.
		 */
		private var _actualWords:Vector.<String>;
		
		/**
		 * The present to be played word.
		 */
		private var _theWord:String;
		
		public function get theWord():String {
			return this._theWord;
		} 
		
		/**
		 * Getter for the ID
		 */
		public function get id():String {
			return this._id;
		}
		
		
		/**
		 * @return The tools panel.
		 */
		public function get myTools():ToolPanel {
			return this.tools;
		}
		
		/**
		 * Path to the back-end
		 */
		private var _phpPath:String;
		public function get phpPath():String {
			return this._phpPath;
		}

		
		/**
		 * Getter for the time limit
		 */
		public function get timeLimit():Number {
			return this._timeLimit;
		}
		
		/**
		 * Getter for the mode status
		 */
		public function get isExam():Boolean {
			return _exam;
		}
		
		
		/**
		 * @return A reference to the search table object. 
		 */
		public function get searchTable():SearchTable {
			return this._searchTable;
		}
		/**
		 * @return Width of the whole puzzle in pixels.
		 */
		override public function get width():Number {
			return this.myWidth;
		}
		/**
		 * @return Height of the whole puzzle in pixels.
		 */
		override public function get height():Number {
			return this.myHeight;
		}

		/**
		 * Do the player's results have to be submitted to the backend ?
		 */
		public function get submitResults():Boolean {
			return this._submitResults;
		}
		/**
		 * Factor for calculating the score
		 */
		public function get timeWeight():Number {
			return this._timeWeight;
		}
		
		
			
		
		private var context:ContextMenu;
		
		/**
		 * Indicates if a solved / matched cards pair is removed from the stage.
		 */
		private var _solvedCardsDisappear:Boolean = false;
		public function get solvedCardsDisappear():Boolean {
			return this._solvedCardsDisappear;
		}
		

		/**
		 * Applause sound object.
		 */
		
		private var applause:Sound = new Applause();

		private var preLoader:PreLoader = new PreLoader();
		/**
		 * Constructor.
		 * @param _width The desired width in pixels.
		 * @param _height The desired height in pixels.
		 * @param _fileName The paramater XML file name+path.
		 */
		public function VocabularyPuzzle(_width:Number, _height:Number, _fileName:String) {
			
			context = new ContextMenu();
			
			var item:ContextMenuItem;
			
			item = new ContextMenuItem("Puzzle by Devarai");          
			item.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, navigate);
			context.customItems.push(item);		
			
			context.hideBuiltInItems();
			
			this.contextMenu = context;
			this.myWidth = _width;
			this.myHeight = _height;
					
			
			_request = new URLRequest(_fileName)
			
			_loader.load(_request);
			_loader.addEventListener(Event.COMPLETE, loadComplete, false, 0, true);
				
			this.fader.graphics.beginFill(0x000000,1.0);
			this.fader.graphics.drawRect(0,0,this.myWidth,this.myHeight);
			this.fader.graphics.endFill();
			fader.alpha = 0;
			
			this.addEventListener(Event.ADDED_TO_STAGE , createClick);
			

		}
		
		/**
		 * Set up a mouse click listener.
		 */
		private function createClick(evt:Event):void {
			stage.addEventListener(MouseEvent.CLICK, startIt);
			(parent as MovieClip).buttonMode = true;
			if (ready) ((parent as Sprite).getChildByName("startField") as Sprite).visible = true;

		}
		
		/**
		 * If the user clicked on the stage the whole thing starts...
		 */
		private var ready:Boolean = false;
		private function startIt(evt:Event):void {
			if (ready) {
				
				(parent as MovieClip).buttonMode = false;
				stage.removeEventListener(MouseEvent.CLICK, startIt);
				((parent as Sprite).getChildByName("startField") as Sprite).visible = false;
				createGame();
				
				
				this.tools.reinit();
				this.tools.enable = true;
				
				
				tools.x = this.myWidth;
				tools.y = -25;
				
				this.addChild(puzzleStage);
				this.addChild(this.fader);
				fader.visible = false;
				this.addChild(tools);
				
				_resultsDialog = new ResultsDialog(this);
				
				this.tools.addEventListener("done", gameEnd);
				

			}
		}
		
		private function navigate(evt:Event):void {
			var request:URLRequest = new URLRequest("http://activeden.net/user/Devarai?ref=Devarai");
			
			try {
				navigateToURL(request, "_blank"); // second argument is target
			} catch (e:Error) {
			}			
		}
		

		
		/**
		 * Called if the Puzzle XML is loaded.
		 */
		private function loadComplete(e:Event):void {
			if (e!=null) _xml= new XML(e.target.data);
			
			// Read in the XML data
												
			
			trace("XML Loaded");
			
			if (_xml.attribute("mode")[0] == "exam") {
				this._exam = true;
			}
			_timeLimit = Number(_xml.attribute("timeLimit")[0]);

				
			this._submitResults =  (String(_xml.attribute("submitResults")[0])=="true")?true:false;

			
			this._timeWeight = Number(_xml.attribute("timeWeight")[0]);
			
			this._selectWordsRandomly = (String(_xml.attribute("randomWordSelection")[0]).toLowerCase()=="true")?true:false;
			 
			
			var pa:String = _xml.php.text();
			
			this._phpPath = pa;
			
			if (pa.length>0 && pa.charAt(pa.length-1)!="/") {
				this._phpPath+="/";
			} 
			
			
			this._id = String(_xml.id.text());
			
		
			if (!this.tools) this.tools = new ToolPanel(this);
			
			
			// Load the picture and continue thereafter
			
			this._words = new Vector.<String>();
			this._actualWords = new Vector.<String>();
			
			var wordies:XMLList = _xml.elements("word");
			
			var item:XML;
			
			for each(item in wordies) {
				
				var w:String = String(item.text());
				this._words.push(w);
				
				if (item.attribute("language")[0]) {
					_language[""+w] = String(item.attribute("language")[0]);
					trace("lang:"+String(item.attribute("language")[0]).toLowerCase());
					trace("word:"+w);
				} else {
					_language[""+w] = "english";
				}
				
				this._actualWords.push(w);
			}
			

			ready = true;
			
			if (stage) ((parent as Sprite).getChildByName("startField") as Sprite).visible = true;
			
					
			
			
		}
		
		private var _blurOld:BlurFilter = new BlurFilter(0,0,3);
		private var intArray: Array = [0.43,0.43,0.43,0,0.43,
			0.43,0.43,0.43,0,0.43,
			0.43,0.43,0.43,0,0.43,
			1,1,1,1,0.33];
		
		private var colorMatrixFilt:Object = new ColorMatrixFilter(intArray);

		/**
		 * Selects a new word to be player.
		 */
		private function selectNewWord():void {
			
			var index:int = 0;
			
			if (this._actualWords.length==0) {
				for (var j:int = 0; j<this._words.length; j++) {
					this._actualWords.push(_words[j]);
				}
			}
			
			
			
			if (this._selectWordsRandomly) {
				index = Math.floor(Math.random()*this._actualWords.length);
			}
			
			this._theWord = this._actualWords[index].toUpperCase();
			this._actualWords.splice(index,1);
			
		}
		
		/**
		 * Does everything to create a new game.
		 */
		private function createGame():void {
			
			/**
			 * Ojo: Start timer first if someone clicked on a card!
			 */
			tools.timer.preInitTimer(this._timeLimit);
			

		
			var i,j:int;
			

			if (_searchTable) {
				if (oldSearchTable) if (puzzleStage.contains(oldSearchTable)) puzzleStage.removeChild(oldSearchTable);
				if (fadeOut) fadeOut.stop();
				oldSearchTable = _searchTable;
				
			}
			

			selectNewWord();
			
			_searchTable = new SearchTable(this);
			

			if (oldSearchTable) {
				fadeOut = new Tween(oldSearchTable,"alpha",None.easeIn,oldSearchTable.alpha,0,0.8,true);
				fadeOut.addEventListener("motionChange",blurOld);
				fadeOut.addEventListener("motionFinish", removeOld);
			}
			
			_searchTable.alpha = 0;
			

			_searchTable.addEventListener("gameEnd",gameEnd);
			
			
			if (fadeInNewTable) fadeInNewTable.stop();
			
			fadeInNewTable = new Tween(_searchTable,"alpha",None.easeIn,_searchTable.alpha,1,1.3,true);
	

			
			puzzleStage.addChild(_searchTable);
			
			_searchTable.x = 0;//this.width/2-_searchTable.width/2;
			_searchTable.y = 0;//this.height/2-_searchTable.height/2;;	
			
			
					

		}
		
		
		private function blurOld(evt:Event):void {

			if (this.oldSearchTable) oldSearchTable.filters = [this._blurOld];
			this._blurOld.blurX+=0.240;
		}
		
		
		/**
		 * These variables are useful if we replay and have old stuff on the stage and have to remove them
		 */
		private var fadeOut:Tween;
		private var fadeInNewTable:Tween;
		private var oldSearchTable:SearchTable;
		private var fadeOutMenu:Tween;
		private var fadeInNewMenu:Tween;

		
		
		
		/**
		 * Removes an old searchtable from the stage.
		 */
		private function removeOld(evt:Event):void {
			if (oldSearchTable) {
				puzzleStage.removeChild(oldSearchTable);
				this.oldSearchTable = null;
			}
		} 
		
		/**
		 * The results dialog window
		 */
		private var _resultsDialog:ResultsDialog;
		
				
		/**
		 * @private
		 */
		public var blurVal:Number = 0;
		/**
		 * Tween for blurring out the puzzle
		 */
		private var blurTween:Tween;
		/**
		 * Filter for blurring
		 */
		private var blurFilter:BlurFilter = new BlurFilter(0,0,3);
		
		/**
		 * Indicates if the game has been finished already.
		 */
		private var finalDialogShown:Boolean = false;
		
		private var resTw:Tween = null;
		private var menTw:Tween = null;
		
		/**
		 * Indicates if the game ended.
		 */
		private var finishedGame:Boolean = false;
		
		public function get haveWeFinished():Boolean {
			return this.finishedGame;
		}
		
		/**
		 * @private
		 */
		public var dummy:Number;
		
		
		/**
		 * This method handles what has to be done if the game is over. So it displays i.e. the results dialog window.
		 * 
		 */
		private function gameEnd(evt:Event):void {
		

			if (!finishedGame) {
				applause.play();
			}
			
			if (this.finalDialogShown) return;
			
			if (!finishedGame) {
					
				this.searchTable.deInit();
				
				this.tools.enable = false;
				
				
				this.tools.timer.stopTimer();
			}

			finishedGame = true;
						

			
			fader.visible = true;
			
			this.finalDialogShown = true;
			
			if (blurTween) blurTween.stop();
			blurTween = new Tween(this,"blurVal",None.easeIn,blurVal,0.5,2.1,true);
			blurTween.addEventListener("motionChange", gameEndAdapt);
			if (resTw) resTw.stop();


			
			
			resTw = new Tween(this.searchTable,"alpha",None.easeIn,searchTable.alpha,0,1.0,true);
			resTw.addEventListener("motionFinish",showResults);				
									
		} 
		


		/**
		 * Restarts a loaded game.
		 */
		public function restartGame():void {
			
			if (this.finalDialogShown) { 
				if (this.contains(this._resultsDialog)) this._resultsDialog.close();
				this.finalDialogShown = false;
			}
			
			this.finishedGame = false;
			

			
			if (this.tools) this.tools.mouseChildren = true;

			
			if (blurTween) blurTween.stop();
			blurTween = new Tween(this,"blurVal",None.easeIn,blurVal,0,1.5,true);
			blurTween.addEventListener("motionChange", gameEndAdapt);
			blurTween.addEventListener("motionFinish",startGameFinal);
			
			this.createGame();

			this.tools.reinit();
			this.tools.enable = true;

			
		}
		
		/**
		 * Screen is prepared for a new game.
		 */
		private function startGameFinal(evt:Event):void {
			if (!this.finalDialogShown) {
				this.puzzleStage.filters = [];
				fader.visible = false;
			}
			
			if (this.tools) this.tools.mouseChildren = true;
		}
		
		/**
		 * Animation hook.
		 */
		private function gameEndAdapt(evt:Event):void {
			fader.alpha = blurVal*0.27;
			blurFilter.blurX = blurVal*12;
			blurFilter.blurY = blurVal*10;
			this.puzzleStage.filters = [blurFilter];
			
		}
		/**
		 * Shows finally the results dialog.
		 */
		private function showResults(evt:Event):void {
			this._resultsDialog.x = this.myWidth/2;
			this._resultsDialog.y = this.myHeight/2;
			this.addChild(this._resultsDialog);
			//this.searchTable.filters = [this.colorMatrixFilt];
		}
			
						
	}
	
}