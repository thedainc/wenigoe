package devarai.common.ui.combo {
	

	import devarai.common.events.InteractionEvent;
	import devarai.common.ui.combo.CellWrapper;
	import devarai.common.ui.combo.ComboBasis;
	import devarai.common.ui.combo.ICombo;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.Regular;
	import fl.transitions.easing.Strong;
	
	import flash.display.DisplayObject;
	import flash.display.Graphics;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.MouseEvent;
	import flash.filters.DropShadowFilter;

	[Event(name="newSelect", type="devarai.common.events.InteractionEvent")]
	/**
	 * This is a combo box component.
	 * @eventType devarai.common.events.InteractionEvent
	 */
	public class Combo extends MovieClip implements ICombo {
		
		private var wrapUntergrund:Sprite;
		private var cwrap:CellWrapper;
		private var cbasis:ComboBasis;
		private var wrapMask:Sprite;
		private var _tabIndex:int = -1;
		private var _tabEnabled:Boolean = false;
		private var filt:DropShadowFilter = new DropShadowFilter(2,111,0x000000,0.9,7,8,1.1,3);
		
		/**
		 * @inheritDoc
		 */
		override public function set filters(value:Array):void {
			if (cbasis) cbasis.filters = value;
		}
		

		
		/**
		 * Enables the combo box.
		 */
		public function enableButton():void {
			cbasis.enableButton();
		}
		
		/**
		 * Disables the combo box so it does not interact anymore.
		 */
		public function disableButton():void {
			cwrap.visible = false;
			cbasis.disableButton();
			
		}
		
		
		
		/**
		 * @copy ICombo#addEntry()
		 */
		public function addEntry(s:String):void {
			cwrap.addEntry(s);
			if (cwrap.length == 1) {
				cbasis.text = s;
				cwrap.aktSelected = [0];
			}
		}
		
		/**
		 * @copy ICombo#empty()
		 */
		public function empty():void {
			cwrap.leeren();
		}
		
		/**
		 * @copy ICombo#aktSelected() 
		 */
		public function get aktSelected():Array {
			return cwrap.aktSelected;
		}
		
		/**
		 * @copy ICombo#aktSelected()
		 */
		public function set aktSelected(a:Array):void {
			if (!a) return;
			var n:int = a[0];
			cwrap.aktSelected = [n];
			cbasis.text = cwrap.aktSelected[1];
			
			
		}
		
		/**
		 * Constructor.
		 * @param breite Initial width in pixels.
		 * @param listHeight Initial height of the list.
		 */
		public function Combo(breite:Number, listHeight:Number) {
			
			this.addEventListener(Event.ADDED_TO_STAGE, init);
			
			cwrap = new CellWrapper(breite-15,listHeight);
			cbasis = new ComboBasis(breite);
			this.addChild(cbasis);
			cbasis.x = 0;
			cbasis.y = 0;
			cwrap.visible = false;
			
			cwrap.x = 0; 
			cwrap.y = cbasis.height+1;
			cwrap.filters = [filt];
						
			cwrap.addEventListener("passOnKey",passonNew);
			cwrap.addEventListener("arrowSel",passon2);
			
			cbasis.addEventListener("passOnKey",passonNew);
			
			wrapMask = new Sprite();
			
			var grafik:Graphics = wrapMask.graphics;
			
			grafik.beginFill(0xFFFFFF);
			grafik.drawRect(0,0,cwrap.width+6,cwrap.height+6);
			grafik.endFill();
			wrapMask.x = -2;
			wrapMask.y = cbasis.height-1;

			this.addChild(wrapMask);
			this.addChild(cwrap);
			
			
			wrapUntergrund = new Sprite();
			
			grafik = wrapUntergrund.graphics;
			
			grafik.beginFill(0x0099ff,0.63);
			grafik.drawRoundRect(0,0,cbasis.width+4,cbasis.height+4,12);
			grafik.endFill();
			wrapUntergrund.x = -3;
			wrapUntergrund.y = -3;
			
			this.addChildAt(wrapUntergrund,0);
			wrapUntergrund.visible = false;
			cwrap.y = -cwrap.height-6;

			wrapMask.visible = false;
			hiding = true;
			this.addEventListener(Event.REMOVED_FROM_STAGE,removeLisener);
			
		}
		
		private function init(evt:Event):void {
			stage.addEventListener(MouseEvent.MOUSE_DOWN, outclicked,false,0.0,true);			
		}
	
		
		private function removeLisener(evt:Event):void {
			
			stage.removeEventListener(MouseEvent.MOUSE_DOWN, outclicked);
		}
		
		
		private function outclicked(evt:Event):void {
			
			if( this.mouseX<cbasis.width+3 && mouseX>-3 && mouseY>0 && mouseY<Math.max(cwrap.y+cwrap.height+3,cbasis.height+3)) return;
			
			if (cwrap.visible && !hiding) passon(null);
			
		}
		/**
		 * @inheritDoc
		 */
		override public function get width():Number {
			return cbasis.width;
		}
		
		private var showTween:Tween = null;
		private var hiding:Boolean = false;
		
		
		
		/**
		 * Init list mask and dispatch event eventually if a row got selected
		 */
		private function passonNew(evt:Event):void {
			var dispatch:Boolean = false;
			if (cwrap.visible) dispatch = true;
			cwrap.mask = wrapMask;
			wrapMask.visible = true;
			passon(evt);
			if (dispatch) this.dispatchEvent(new InteractionEvent(InteractionEvent.NEW_SELECT,true));
		}
		
		private function passon(evt:Event):void {
			
			var arr:Array = cwrap.aktSelected;
			if (arr) cbasis.text = arr[1];
			
			if (showTween) showTween.stop();
			
			if ((cwrap.visible && !hiding) || evt == null) {
				// hide the list
				showTween = new Tween(cwrap,"y",Regular.easeIn,cwrap.y,-cwrap.height-6,0.5,true);
				showTween.addEventListener("motionFinish",invis);				
				hiding = true;
			}
			else if (evt != null) {
				// show the list
				cwrap.visible = true;
				showTween = new Tween(cwrap,"y",Regular.easeOut,cwrap.y,cbasis.height+1,0.8,true);			
				hiding = false;
			}
		}
		
		/**
		 * Show list on arrow select.
		 */
		private function passon2(evt:Event):void {
			
			var arr:Array = cwrap.aktSelected;
			if (arr) cbasis.text = arr[1];
			
			if (showTween) showTween.stop();
			
			if (!cwrap.visible) {
				cwrap.y = -cwrap.height-6;
				cwrap.visible = true;
				showTween = new Tween(cwrap,"y",Regular.easeOut,cwrap.y,cbasis.height+1,0.8,true);			
			}
			

		}
		
		private function invis(evt:Event):void {
			cwrap.visible = false;
			hiding = false;
		}
		
	}
	
	
}