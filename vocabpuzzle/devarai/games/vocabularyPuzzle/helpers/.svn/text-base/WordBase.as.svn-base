package devarai.games.vocabularyPuzzle.helpers{
	
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.text.TextField;
	import flash.text.TextFormat;
	
	/**
	 * This clas holds the base word and allows to select letters out of it to build an own word.
	 */
	public class WordBase extends MovieClip {
		
		/**
		 * Reference to main class.
		 */
		private var _sc:VocabularyPuzzle;
		
		/**
		 * Space between letters in pixels.
		 */
		private var _space:Number = 5;
		
		private var letters:Vector.<LetterBox> = new Vector.<LetterBox>();
		private var letterLayer:Sprite = new Sprite();
		/**
		 * Cancel button.
		 */
		private var butt:Sprite;
		
		/**
		 * Format
		 */
		private var tform:TextFormat = new TextFormat("Arial",15,0x333333,null,null,null);
		/**
		 * The flags.
		 */
		private var flags:MovieClip;
		
		/**
		 * Constructor.
		 */
		public function WordBase(sc:VocabularyPuzzle) {
			
			_sc = sc;
			
			var i:int = 0; 
			
			var _x:Number = 0;
			
			for (i = 0; i<_sc.theWord.length; i++) {
				var let:LetterBox = new LetterBox(_sc.theWord.charAt(i));
				letterLayer.addChild(let);
				letters.push(let);
				let.x = _x;
				let.addEventListener("interaction", newLetter);
				_x+=let.width;
				_x+=_space;
				
			}
			
			
			this.addChild(letterLayer);
			
			letterLayer.y = 41;
			letterLayer.x = 40;
			
			
			var lang:String = _sc.language[""+_sc.theWord];
			
			trace("lang:"+lang);
			
			
			lang = lang.charAt(0).toUpperCase()+lang.substr(1);
			
			var len:int = intro_txt.length;
			
			(intro_txt as TextField).appendText( "Please create "+"words in the '"+lang+"' language with these letters:");
			
			intro_txt.replaceText(0,len,"");
			
			
			
			_sc.myTools.timer.startTimer(_sc.timeLimit);
			
			
			
			
			(butto as Sprite).addEventListener("interaction", cancel);
			
			
			
		}
		
		
		
			
			
		
		/**
		 * Cancels this word.
		 */
		private function cancel(evt:Event):void {
			this.dispatchEvent(new Event("gameEnd",true));
		}
		
		/**
		 * Triggered if user clicks on a letter of the base word.
		 */
		private function newLetter(evt:Event):void {
			
			var let:LetterBox = evt.currentTarget as LetterBox;
			
			_sc.searchTable.myInputLine.appendLetter(let.theLetter);
			
		}
		
		
	}
	
	
	
	
}