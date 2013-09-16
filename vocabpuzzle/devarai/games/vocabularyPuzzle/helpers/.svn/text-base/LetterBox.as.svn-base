package devarai.games.vocabularyPuzzle.helpers{
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.text.TextField;
	import flash.text.TextFormat;
	
	/**
	 * Hold a letter of the base word which can be selected and chosen.
	 */
	public class LetterBox extends MovieClip {
		
		/**
		 * The letter.
		 */
		private var myLetter:String = "";
		
		public function get theLetter():String {
			return this.myLetter;
		}
		
		/**
		 * The textField.
		 */
		private var tf:TextField;
		
		/**
		 * Format
		 */
		private var tform:TextFormat = new TextFormat("Arial", 24,0x222222,true,null,null,null,null,"left");
		
		override public function get width():Number {
			return tf.width;
		}
		
		/**
		 * Constructor.
		 */
		public function LetterBox(l:String) {
			
			tf = new TextField();
			tf.text = l;
			myLetter = l;
			tf.width = 200;
			tf.height =  200;
			
			tf.embedFonts = true;
			
			tf.selectable = false;
			this.mouseChildren =false;
			this.buttonMode = true;
			this.focusRect = false;
			
			tf.setTextFormat(tform);
			
			if (l==" ") {
				tf.height = 24;
				tf.width = 20;
			} else {
				
				var rect:Rectangle = null;
				
				rect = tf.getCharBoundaries(0);
				
				if (!rect) {
					tf.height = 24;
					tf.width = 20;

				} else {
					tf.height = rect.y+rect.height+4;
					tf.width = rect.x + rect.width+4;
				}
				

				
			}
			
			this.addChild(tf);
			
			var dummySpr:Sprite = new Sprite();
			dummySpr.graphics.beginFill(0,0);
			dummySpr.graphics.drawRect(0,0,tf.width,tf.height);
			dummySpr.graphics.endFill();
			
			this.addChild(dummySpr);
			
			this.addEventListener(MouseEvent.CLICK, forwardMe);
			
		}
		
		private function forwardMe(evt:Event):void {
			this.dispatchEvent(new Event("interaction"));
		}
		
		
		
	}
	
	
}