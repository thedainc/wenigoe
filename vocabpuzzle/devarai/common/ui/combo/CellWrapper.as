package devarai.common.ui.combo {
	
	import devarai.common.ui.combo.CellBasis;
	import devarai.common.ui.scrollbars.IScrollBar;
	import devarai.common.ui.scrollbars.VerticalScrollbar;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.Graphics;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	
	/**
	 * This class wraps the CellBasis instances to generate some kind of list enabling selection.
	 * @see CellBasis
	 * @see Combo
	 * @private 
	 */
	public class CellWrapper extends MovieClip implements IScrollBar {
		
		private var scrollBar:VerticalScrollbar; 
		
		private var cellsLayer:MovieClip;
		private var cells:Vector.<CellBasis>;
		
		private var _breite:Number;
		private var _hoehe:Number;
		private var arrowAction:Boolean = false;

		private var newScrollV : Number = 0;

		
		/**
		 * @private
		 * Gets called if the enter key is pressed. 
		 */
		public function enterHandler(evt:Event):void {
			this.dispatchEvent(new Event("passOnKey"));
		}
		
		public function get pageHeight():Number {
			return this._hoehe;
		}
		
		/**
		 * @private
		 * Gets triggered if the arrow up key is pressed.
		 */
		public function arrowUp(evt:Event):void {
			var ind:int =  0;
			if (cells.length == 0) return;
			for (var i = 0 ; i<cells.length; i++) { 
				if (cells[i].iAmSelect) ind = i; 
				cells[i].unSelectMe(); 
			}
			ind--;
			if (ind <0) ind = 0;
			cells[ind].selectMe();
			if (cells[ind].y < newScrollV) setScrollPosV(Math.max(0,cells[ind].y));
			
			this.dispatchEvent(new Event("cursorUpdate"));
			this.dispatchEvent(new Event("arrowSel"));		
		}
		
		/**
		 * @private
		 * Is called if the arrow down key is pressed.
		 */
		public function arrowDown(evt:Event):void {
			var ind:int =  0;
			if (cells.length == 0) return;
			for (var i = 0 ; i<cells.length; i++) { 
				if (cells[i].iAmSelect) ind = i; 
				cells[i].unSelectMe(); 
			}
			ind++;
			if (ind >= cells.length) ind = cells.length-1;
			cells[ind].selectMe();
			if (cells[ind].y + cells[ind].height > newScrollV+_hoehe) setScrollPosV(Math.min(cells[ind].y + cells[ind].height-_hoehe,getMaxScrollPosV()));
			
			this.dispatchEvent(new Event("cursorUpdate"));
			this.dispatchEvent(new Event("arrowSel"));

		}
		
		/**
		 * @return Gives you the selection info. I.e. [2,"Hello"] where "2" says that row index 2 is selected. Content of this cell is "Hello".
		 */
		public function get aktSelected():Array {
			for (var i = 0 ; i<cells.length; i++) if (cells[i].iAmSelect) return [i,cells[i].text];
			return null;
		}
		/**
		 * Selects row with index [i]
		 * @param a Array with one element like "[2]". "2" is the index as an int.
		 */
		public function set aktSelected(a:Array):void {
			var n:int = a[0];
			if (n<0 || n > cells.length) return;
			for (var i = 0 ; i<cells.length; i++) cells[i].unSelectMe();
			cells[n].selectMe();
		}
		
		/**
		 * Sets the width in pixels of everything according to "awid" variable.
		 */
		private function setWidth():void {
			var awid:Number = _breite;
			
			if (getMaxScrollPosV()<=0) awid+= 14;
			
			faderUp.width = awid+1;
			faderDown.width = awid+1;
			myRect.width = awid+1;
			drawTransRectV(newScrollV<=0, newScrollV>=getMaxScrollPosV());
			
			for (var i = 0 ; i<cells.length; i++) cells[i].width = awid;
			
		}
		/**
		 * @inheritDoc
		 */
		override public function set width(value:Number):void {
			_breite = value;
			setWidth();
		}
		/**
		 * @inheritDoc
		 */
		override public function get width():Number {
			return _breite+14;
		}
		/**
		 * @inheritDoc
		 */
		override public function set height(value:Number):void {
			_hoehe = value;
			this.dispatchEvent(new Event("cursorUpdate"));
			drawTransRectV(newScrollV<=0, newScrollV>=getMaxScrollPosV());
		}
		
		/**
		 * @inheritDoc
		 */
		override public function get height():Number {
			return _hoehe;
		}
		
		/**
		* @copy devarai.common.ui.scrollbars.IScrollBar#scrollPosV()
		 */
		public function get scrollPosV():Number {
			return newScrollV;
		}
		
		private var scrollVTweener:Tween;
		
		/**
		 * @private
		 */
		public var myScrollV:int = 0;
		
		private var faderUp:MovieClip;
		private var faderDown:MovieClip;
		
		private var faders:MovieClip;
		private var myRect:MovieClip;
		
		private var untergrund:Sprite;
		
		
		private function  drawTransRectV(up:Boolean, down:Boolean):void {
			
			var ystart:Number =  -1;
			var yheight:Number = _hoehe;
						
			myRect.y = ystart; 
			myRect.height =  yheight;
			
		}	

		private function setScrollPosV(n:Number):void {
			
			if (n<0) n = 0;
			else if (n>getMaxScrollPosV()) n = getMaxScrollPosV();
			
			newScrollV = n;
			if (scrollVTweener) scrollVTweener.stop();

			scrollVTweener = new Tween(this,"myScrollV",None.easeIn,myScrollV,newScrollV,0.15,true);
			scrollVTweener.addEventListener("motionChange",scrollVTweenerFunc);

			drawTransRectV(newScrollV<=0, newScrollV>=getMaxScrollPosV());

		}
		
		private function cursorCorrect(evt:Event):void {

			CellBasis.arrowAction = false;

		}

		/**
		 * @copy devarai.common.ui.scrollbars.IScrollBar#scrollPosV()
		 */
		public function set scrollPosV(n:Number):void {
			setScrollPosV(n);
		}
		
		private function scrollVTweenerFunc(evt:Event):void {
				cellsLayer.y = -myScrollV;
				
		}

		/**
		 * @copy devarai.common.ui.scrollbars.IScrollBar#maxScrollPosV()
		 */
		public function get maxScrollPosV():Number {
			if (cells.length == 0) return 0;
			return Math.max(0,int(cells[cells.length-1].y+cells[cells.length-1].height-_hoehe));
		}
		
		private function getMaxScrollPosV():Number {
			if (cells.length == 0) return 0;
			else return Math.max(0,int(cells[cells.length-1].y+cells[cells.length-1].height-_hoehe));
		}

		
		/**
		 * @return The actual number of entries.
		 */
		public function get length():int {
			return cells.length;
		}
		
		/**
		 * Adds a row to the list.
		 * @param value The content / text of this row/cell.
		 */
		public function addEntry(value:String):void {
			var acell:CellBasis = new CellBasis(_breite);
			acell.text = value;
			acell.x = 0;
			if (cells.length>0) acell.y = cells[cells.length-1].y+cells[cells.length-1].height;
			else acell.y  = 0;
			cellsLayer.addChild(acell);
			cells.push(acell);
			drawTransRectV(newScrollV<=0, newScrollV>=getMaxScrollPosV());
			if (getMaxScrollPosV()<=0) {
				scrollBar.visible = false;
				untergrund.height=cells[cells.length-1].y+cells[cells.length-1].height+4;
			} else {
				scrollBar.visible = true;
				untergrund.height = _hoehe+6;
			}
			setWidth();		
			this.dispatchEvent(new Event("cursorUpdate"));
			this.dispatchEvent(new Event("cursorUpdateH"));
			acell.addEventListener("cellClick",cellClick);
			
		}
		
		private function cellClick(evt:Event):void {
			for (var i = 0 ; i<cells.length; i++) cells[i].unSelectMe();
			(evt.currentTarget as CellBasis).selectMe();
			this.dispatchEvent(new Event("passOnKey"));
		}
		
		/**
		 * Empties the whole list.
		 */
		public function leeren():void {
			for (var i = 0; i<cells.length; i++) cellsLayer.removeChild(cells[i]);
			cells.splice(0,cells.length);
		}
		
		
		
		/**
		 * The constructor.
		 * @param wid Initial width in pixels.
		 * @param hei Initial height in pixels.
		 */
		public function CellWrapper(wid:Number = 100, hei:Number = 100) {
			
						
			_breite = wid;
			_hoehe = hei;
			cells = new Vector.<CellBasis>();
			
			cellsLayer = new MovieClip();
			this.addChild(cellsLayer);
			cellsLayer.cacheAsBitmap = true;
			
			
			
			faderUp = this.getChildByName("_faderUp_mc") as MovieClip;
			faderDown = this.getChildByName("_faderDown_mc") as MovieClip;

			faders = new MovieClip();
			
			myRect = new MovieClip();
			
			
			
			var grafik : Graphics = myRect.graphics;
			grafik.beginFill(0x000000);
			grafik.drawRect(0,0,_breite,10);
			grafik.endFill();
			
			myRect.x = 0;
			myRect.height = 0;
			myRect.cacheAsBitmap = true;
			
			faderUp.x = 0;
			faderDown.x = 0;
			
			faderUp.y = 0;
			faderDown.y = _hoehe-faderDown.height;
			
			faderUp.width = _breite;
			faderDown.width = _breite;
			
			
			this.removeChild(faderUp);
			this.removeChild(faderDown);
			
			faders.addChild(faderUp);
			faders.addChild(faderDown);
			faders.addChild(myRect);
			
			this.addChild(faders);
			faders.cacheAsBitmap = false; //true;
			faders.x = -1;

			cellsLayer.mask = faders;
			
			untergrund = new Sprite();
			grafik = untergrund.graphics;
			grafik.beginFill(0xFFFFFF);
			grafik.lineStyle(3,0xCCCCCC,0.7);
			grafik.drawRect(0,0,_breite+16,_hoehe+3);
			grafik.endFill();
			untergrund.x  = -2;
			untergrund.y = -2;
			

			scrollBar = new VerticalScrollbar(this,_hoehe);	
			scrollBar.wheelSpeed = 3;
			scrollBar.x = _breite;
			scrollBar.y = 0;

			this.addChildAt(scrollBar,0);
			
			this.addChildAt(untergrund,0);
			
		}
		
		
		
	}
	
	
	
}