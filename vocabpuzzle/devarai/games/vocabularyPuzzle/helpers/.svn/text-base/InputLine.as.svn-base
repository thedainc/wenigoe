package devarai.games.vocabularyPuzzle.helpers{
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	import devarai.games.vocabularyPuzzle.results.ResultButton;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.text.TextField;
	import flash.text.TextFormat;
	
	/**
	 * Handles the user input words.
	 */
	public class InputLine extends MovieClip {
		

		
		/**
		 * Link to main class.
		 */
		private var sc:VocabularyPuzzle;
		
		/**
		 * The input textField
		 */
		private var tf:TextField;
		/**
		 * Format
		 */
		private var tform:TextFormat = new TextFormat("Arial",18,0x333333,null,null,null,null,null,"left");
		/**
		 * Enter glass
		 * 
		 */
		private var glass:MovieClip;
		
		/**
		 * Constructor.
		 */
		public function InputLine(_sc:VocabularyPuzzle) {
			


			
			tf = this.getChildByName("myWord_txt") as TextField;
			
			glass = this.getChildByName("magni_mc") as MovieClip;
			glass.buttonMode = true;
			tf.selectable = false;
			glass.focusRect = false;
			
			
			var lang:String = _sc.language[""+_sc.theWord];
			
						
			if (lang.toLowerCase() == "english") glass.flag.gotoAndStop(1);
			else if (lang.toLowerCase() == "german") glass.flag.gotoAndStop(2);
			else glass.visible = false;
			
			glass.addEventListener(MouseEvent.CLICK, enter);
			sub_mc.addEventListener("interaction",enter);
					
			tf.text = "";
			this.adjustTF();
			
			sc = _sc;
			
		}
		/**
		 * Backspace
		 */
		public function delLastChar():void {
			
			
			if (tf.text == "") {
				return;
			}
			
			tf.replaceText(tf.length-1,tf.length,"");
			
			if (tf.text=="") {
				tf.text = "";
			}
			
			tf.setTextFormat(this.tform);
			adjustTF();
		}
		/**
		 * Is is true if the backend has to verify the user word.
		 */
		private var waiting:Boolean = false;
		
		
		public function resume():void {
			
			trace("resume called");
			tf.text = "";
			this.adjustTF();
			waiting = false;			
			glass.gotoAndStop(1);
			glass.buttonMode = true;

			var lang:String = sc.language[""+sc.theWord];
			
			
			if (lang.toLowerCase() == "english") glass.flag.gotoAndStop(1);
			else if (lang.toLowerCase() == "german") glass.flag.gotoAndStop(2);
			else glass.visible = false;

			this.mouseChildren = true;
		}
		
		/**
		 * This is triggered if the user wants to submit his word.
		 */
		public function enter(evt:Event):void {
			
			if (tf.length>1 && !waiting) {
				
				waiting = true;
				glass.gotoAndStop(2);
				glass.buttonMode = false;

				this.mouseChildren = false;

				sc.searchTable.myGameTable.checkWord(tf.text);
			}
		}
		
		/**
		 * Adjusts the textfield and the magni glass.
		 */
		private function adjustTF():void {
			var rect:Rectangle = null;
			tf.width = 1000;
			
			tf.setTextFormat(this.tform);
			var i:int = tf.length-1;
			
			
			while (rect == null && i>=0) {
				rect = tf.getCharBoundaries(i);
			}
			
			if (rect) {
				tf.width = rect.x + rect.width+5;
			} else {
				tf.width = 10;
			}
			
			tf.width = Math.min(tf.width, 215);
			
			glass.x = tf.x + tf.width + 2;
		}
		
		/**
		 * Adds a letter to the user word.
		 */
		public function appendLetter(l:String):void {
			
			if (waiting) return;
			
			if (tf.text=="") tf.text = "";
			
			tf.appendText(l);
			adjustTF();
			
		}
		
		/**
		 * Deprecated
		 */
		private function clearField(evt:Event):void {
			
			if (waiting) return;
			
			tf.text = "";
			adjustTF();
			
		}
		
	}
	
	
}