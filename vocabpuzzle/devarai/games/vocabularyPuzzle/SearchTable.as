package devarai.games.vocabularyPuzzle {
	
	import devarai.common.ui.IContentElement;
	import devarai.games.vocabularyPuzzle.helpers.GameTable;
	import devarai.games.vocabularyPuzzle.helpers.InputLine;
	import devarai.games.vocabularyPuzzle.helpers.WordBase;
	
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.display.BlendMode;
	import flash.display.CapsStyle;
	import flash.display.Graphics;
	import flash.display.GraphicsPathCommand;
	import flash.display.JointStyle;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.filters.BevelFilter;
	import flash.filters.DropShadowFilter;
	import flash.filters.GlowFilter;
	import flash.geom.Matrix;
	import flash.geom.Point;
	import flash.utils.Dictionary;
	import flash.utils.Timer;
	import devarai.common.keyboard.DummyKeyb;
	import devarai.common.keyboard.dummyKey.KeyEvent;

	/**
	 * This is the SearchTable class. It keeps track of the search table. With this class we control the 
	 * input and evaluation of words.
	 */
	public class SearchTable extends MovieClip {
		
		/**
		 * A reference to the main class.
		 */
		private var sp:VocabularyPuzzle;

		/**
		 * Keyboard Handler.
		 */
		
		private var keyb:DummyKeyb = new DummyKeyb();

		/**
		 * Instance of the game table handling user words and statistics.
		 */
		private var table:GameTable;
		/**
		 * Getter
		 */
		public function get myGameTable():GameTable {
			return this.table;
		}
		
		private var wordBase:WordBase;
		
		/**
		 * Instance of the input line.
		 */
		private var inputLine:InputLine;
		/**
		 * Getter
		 */
		public function get myInputLine():InputLine {
			return this.inputLine;
		}

		/**
		 * Constructor.
		 * @param _sp The main class.
		 */
		public function SearchTable(_sp:VocabularyPuzzle) {
			
			trace("new Searchtable");
			
			this.sp = _sp;

			
			this.addEventListener(Event.ADDED_TO_STAGE, addedToStage);
			this.addEventListener(Event.REMOVED_FROM_STAGE, removedFromStage);

			
			table = new GameTable(_sp);
			
			this.addChild(table);
			
			table.x = 2;
			table.y = 143;
			
			wordBase = new WordBase(_sp);
			
			this.addChild(wordBase);
			
			wordBase.x = 0;
			wordBase.y = 11;
			
			inputLine = new InputLine(_sp);
			
			this.addChild(inputLine);
			inputLine.x = 11;
			inputLine.y = 105;
			
			keyb.addEventListener("enter", enterEvent);
			keyb.addEventListener("entf", delEvent);
			keyb.addEventListener("backspace", delEvent);
			
			keyb.addEventListener(KeyEvent.NEWINPUT, charInput);

		}
		/**
		 * Handles user char input.
		 */
		private function charInput(evt:KeyEvent):void {
						
			var char:String = evt.char.toUpperCase();
			
			if (sp.theWord.lastIndexOf(char) == -1) {
				return;
			}
			
			this.myInputLine.appendLetter(char);
			
		}	
		
		/**
		 * Handles deletion keyboard events
		 */
		private function delEvent(evt:Event):void {
			this.myInputLine.delLastChar();
		}
		
		/**
		 * This method reacts to the enter key.
		 */
		private function enterEvent(evt:Event):void {
			trace("enter pressed");
			this.myInputLine.enter(null);
			
		}

		/**
		 * Statistics for the evaluation.
		 */
		public function statistics():Array {
			
			var i,j:int;
			
			
			var all:int = 0;
			
		
			return this.myGameTable.stat;
			
		}
		
		
		/**
		 * 
		 */
		private function addedToStage(evt:Event):void {
			keyb.construct(stage);
			
			
		}
		/**
		 * Cleans up if removed from stage.
		 */
		private function removedFromStage(evt:Event):void {
		}
		/**
		 * Called if the mouse button is released.
		 */
		private function mouseUp(evt:Event):void {
				
		}
		
		
		
		/**
		 * Undo the keyboard handlers.
		 */
		public function deInit():void {
			
			table.finishPlay();
			this.keyb.deInit();
		}
		
		/**
		 * Coordinates of the start and end points of the current selection.
		 */
		private var startX:Number = -1;
		private var startY:Number = -1;
		

		
		
		/**
		 * Deprecated 
		 */
		private var myHeight:Number = 0;
		
		/**
		 * @inheritDoc
		 */
		override public function get height():Number {
			return myHeight;
		} 
	
	}


}