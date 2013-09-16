package devarai.common.ui.menu {
	
	import devarai.common.ui.IContentElement;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.BlendMode;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.text.TextField;
	import flash.text.TextFormat;
	
	/**
	 * This is a row/element of the menu class.
	 * @see Menu
	 */
	public class MenuRow extends MovieClip implements IMenuRow {
		
		/**
		 * UI
		 */
		
		protected var select:MovieClip;
		protected var unselect:MovieClip;
		
		private var marker:MovieClip;
		private var markerLight:MovieClip;
		
		protected var tfSel:Sprite;
		protected var tfUnsel:Sprite;
		
		/**
		 * Is the cell activated ?
		 */
		private var _activated:Boolean = false;
		
		/**
		 * Dimensions.
		 */
		protected var _width:Number;
		protected var _height:Number;
		
		private var myText:String;
		
		/**
		 * The content element.
		 */
		protected var myWord:IContentElement;
		
		
		/**
		 * @return The content of this row
		 */
		public function get content():String {
			return myText;
		}
		
		/**
		 * @return The width of the content in pixels.
		 */
		public function get myWidth():Number {
			return this._width;
		} 
		/**
		 */
	
		/**
		 * Creates the content sprite/display object out of a IContentElement.
		 */
		protected function createTextSprite(word:IContentElement, color :int = 0xffffff):Sprite {
		
			
			
			var temp:Sprite = new Sprite();
			var tfo:TextFormat = new TextFormat("_sans",14,color,null,null,null,null,null,"left");
			
			var tf:TextField = new TextField();
			tf.width = this._width-58;
			tf.height = 600;
			tf.multiline = true;
			tf.wordWrap = true;
			
			tf.text = ""+word.info;
			tf.setTextFormat(tfo);

			var rect:Rectangle = null;
			
			var i:int = tf.text.length-1;
			
			while (rect == null && i>0) {
				rect = tf.getCharBoundaries(i);
				i--;
			}
			
			if (rect == null) tf.height = 24; 
			else tf.height = rect.y+rect.height+5;

			
			var no:TextField = new TextField();
			
			no.text = word.no+".";
			
			no.width = 20;
			no.height = 22;
			
			no.setTextFormat(tfo);
			
			
			
			
			this._height = tf.height+3;
			
			tf.selectable = false;
			tf.x = 20;
			
			temp.addChild(tf);
			
			
			no.x = 4;
			temp.addChild(no);
			
			return temp;
		}
		
		/**
		 * Constructor.
		 * @param _width The row width in pixels.
		 * @param text The content string.
		 */
		public function MenuRow(_width:Number, word:IContentElement) {
			
			this._width = _width;			
			this.myWord = word;
			

			this.myText =  word.info;
			
			
			
			tfSel = this.createTextSprite(word);
			tfUnsel = this.createTextSprite(word,0x595959);
			

			tfSel.alpha = 0;
			
			this.finishInit();
			
					
		}
		
		/**
		 * Outsourced part of the constructor. Now accessible for sub-classes.
		 */
		protected function finishInit():void {
			this.mouseChildren = false;
			this.focusRect = false;
			
			this.blendMode = BlendMode.MULTIPLY;
			this.cacheAsBitmap = true;
			
			select = this.getChildByName("row_selected") as MovieClip;
			unselect = this.getChildByName("row_unselected") as MovieClip;
			marker = this.getChildByName("marker_mc") as MovieClip;
			markerLight = this.getChildByName("lighter_sel") as MovieClip;
			unselect.alpha = 0.55;
			select.alpha = 0;
			
			marker.alpha = 0;
			markerLight.alpha = 0;

			this.addEventListener(MouseEvent.MOUSE_OVER, over);
			this.addEventListener(MouseEvent.MOUSE_OUT,out);
			this.addEventListener(MouseEvent.CLICK, activateMe);
			
			
			select.height = this._height;
			unselect.height = this._height;
			marker.height = this._height;
			markerLight.height = this._height;
			
			tfSel.y = 3;
			tfUnsel.y = 3;
			
			
			select.width = _width;
			unselect.width = _width;
			marker.width = _width;
			markerLight.width = _width;
			
			
			tfUnsel.alpha = 0.88;
			
			this.addChild(tfUnsel);
			this.addChild(tfSel);

		}
		
		
		/**
		 * @return The saved in this cell.
		 */
		public function get theContent():IContentElement {
			return this.myWord;
		}
		
		private var markerTw:Tween = null;
		private var markerTw2:Tween = null;
		
		/**
		 * Highlights the cell.
		 */
		public function set lightMarker(v:Boolean) {
			if (v) {
				
				if (markerTw2) markerTw2.stop();
				markerTw2 = new Tween(markerLight,"alpha",None.easeIn,markerLight.alpha,1,0.3,true);
			}
			else {
				if (markerTw2) markerTw2.stop();
				markerLight.alpha = 0;
			}
			
			
		}
		
		private var isRed:Boolean = false;
		
		/**
		 * Highlights the cell.
		 */
		public function set redMarker(v:Boolean) {
			if (v) {
				isRed = true;
				if (markerTw) markerTw.stop();
				markerTw = new Tween(marker,"alpha",None.easeIn,marker.alpha,1,0.3,true);
				over(null)
				
			}
			else {
				isRed = false;
				if (markerTw) markerTw.stop();
				marker.alpha = 0;
				out(null);
				
			}
			
		}
		
		public function get redMarker():Boolean {
			return this.isRed;
		}
		
		/**
		 * Activated this row.
		 */
		private function activateMe(evt:MouseEvent):void {
			//this._activated = !this._activated;
			this.dispatchEvent(new Event("someoneClicked"));
		}
		
		/**
		 * Is the the line/element activated. Someone clicked on it the first time?
		 */
		public function get activated():Boolean {
			if (marker.alpha >0) return false;
			return this._activated;
		}
		
		/**
		 * Animation tweens.
		 */
		private var tw1:Tween = null;
		private var tw2:Tween = null;
		
		
		/**
		 * Mouse over
		 */
		private function over(evt:MouseEvent):void {
			if (tw1) tw1.stop();
			if (tw2) tw2.stop();
			
						
			tw1 = new Tween(select,"alpha",None.easeIn,select.alpha,1,0.14,true);
			tw2 = new Tween(tfSel,"alpha",None.easeIn,tfSel.alpha,1,0.14,true);
			
		}
		
		/**
		 * Mouse out 
		 */
		private function out(evt:MouseEvent):void {
			
			if (this._activated) return;
			if (marker.alpha == 1 || isRed) return;
			
			if (tw1) tw1.stop();
			if (tw2) tw2.stop();
			
			tw1 = new Tween(select,"alpha",None.easeIn,select.alpha,0,0.24,true);
			tw2 = new Tween(tfSel,"alpha",None.easeIn,tfSel.alpha,0,0.24,true);
			
		}
		
	}
	
}