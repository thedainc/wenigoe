package devarai.common.ui.scrollbars{
	
	import devarai.common.ui.scrollbars.IScrollBar;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.filters.ColorMatrixFilter;
	import flash.filters.GlowFilter;
	import flash.geom.Rectangle;
	import flash.utils.Timer;
	
	/**
	 * 
	 * This is a basic vertical scroll bar class
	 * 
	 */
	public class VerticalScrollbar extends MovieClip {
		
		/**
		 * The target object for this scrollbar
		 */
		private var myComponent:IScrollBar;
		
		/**
		 * Scroll thumb bar
		 */
		private var thumbWrapper:MovieClip = new MovieClip;
		private var thumbRect:Rectangle;
		
		// Present maximum scrolling
		private var max:int;
		// Present scrolling position
		private var pos:int;
		
		
		/**
		 * Display object from the lib
		 */
		private var thumbAddy_mc:MovieClip;
		private var scrollTrack_mc:MovieClip;
		private var scrollThumb_mc:MovieClip;

		/**
		 * The height of the scrollbar
		 */
		private var heightMe:Number;
		
		/**
		 * Mouse wheel speed factor
		 */
		private var _wheelSpeed:Number = 5;
		
		/**
		 * Adjusts the effect the mouse wheel has.
		 * @param val The amount of effect of the mouse wheel.
		 */
		public function set wheelSpeed(val:Number) {
			_wheelSpeed = val;
		}
		
		/**
		 * Tween and filter for animating the scrollbar thumb bar
		 */
		private var thumbGlow:GlowFilter = new GlowFilter(0xffffff,0.0,10,10,2,3,true); 
		private var thumbTw:Tween;
		/**
		 * Dummy fct for refreshing the filter.
		 */
		private function setThumbFilter(evt:Event):void {
			thumbWrapper.filters = [thumbGlow];
		}
		/**
		 * This method is called if the mouse cursor is over the scrollbar thumb bar
		 */
		private function overThumb(evt:Event):void {
		
			if (thumbTw) thumbTw.stop();
			thumbTw = new Tween(thumbGlow,"alpha",None.easeIn,thumbGlow.alpha,0.10,0.2,true);
			thumbTw.addEventListener("motionChange", setThumbFilter);
		}

		/**
		 * This method is called if the mouse cursor leaves the scrollbar thumb bar
		 */
		private function outThumb(evt:Event):void {
			if (thumbTw) thumbTw.stop();
			thumbTw = new Tween(thumbGlow,"alpha",None.easeIn,thumbGlow.alpha,0,0.2,true);
			thumbTw.addEventListener("motionChange", setThumbFilter);
		}

		
		/**
		 * Constructor.
		 * @param textf The target object that implements IScrollBar.
		 * @param forceHeight The height of our scroll bar.
		 */
		public function VerticalScrollbar(textf:IScrollBar, forceHeight:Number) {
		
			this.visible = false;
			this.alpha = 0;
			
			this.thumbAddy_mc = this.getChildByName("_thumbAddy_mc") as MovieClip;
			this.scrollTrack_mc = this.getChildByName("_scrollTrack_mc") as MovieClip;
			this.scrollThumb_mc = this.getChildByName("_scrollThumb_mc") as MovieClip;
			
			
			thumbAddy_mc.mouseEnabled = false;
			myComponent = textf;
			
			thumbWrapper.addChild(scrollThumb_mc);
			thumbWrapper.addChild(thumbAddy_mc);
			this.addChild(thumbWrapper);
			
			thumbWrapper.addEventListener(MouseEvent.MOUSE_OVER, overThumb);
			thumbWrapper.addEventListener(MouseEvent.MOUSE_OUT, outThumb);

			
			scrollThumb_mc.y  = 0;
		
			
					
			
			(myComponent as EventDispatcher).addEventListener("cursorUpdate",refreshScrollbar);
			(myComponent as EventDispatcher).addEventListener("cursorUpdateV",refreshScrollbar);
			scrollTrack_mc.y --;
			
			thumbWrapper.x = scrollTrack_mc.x-1;
			
			thumbWrapper.addEventListener(MouseEvent.MOUSE_DOWN, startThumbDrag);
			
			this.addEventListener(Event.ADDED_TO_STAGE, addStageListeners);			
			
			(myComponent as EventDispatcher).addEventListener(MouseEvent.MOUSE_WHEEL, mouseWheel);
			this.addEventListener(MouseEvent.MOUSE_WHEEL, mouseWheel);
			
			scrollTrack_mc.addEventListener(MouseEvent.MOUSE_DOWN, trackClickdown);
			
			
			trackClickTimer = new Timer(85,0);
			waiter = new Timer(400,1);
			trackClickTimer.addEventListener(TimerEvent.TIMER, trackClick);
			waiter.addEventListener(TimerEvent.TIMER_COMPLETE,firstDelay);
			
			reinit(forceHeight);
			
		}

		/**
		 * If added to stage we set some listeners
		 */
		private function addStageListeners(evt:Event):void {
			stage.addEventListener(MouseEvent.MOUSE_UP, stopThumbDrag,false,0.0,true);
		}
		
		private function reinit(value:Number):void {
			
			heightMe = value;
			
			scrollTrack_mc.height = heightMe;
			thumbRect = new Rectangle(scrollTrack_mc.x-1,scrollTrack_mc.y,0,scrollTrack_mc.height - scrollThumb_mc.height);
			
			if (tweenThumbPos) tweenThumbPos.stop();
			if (tweenThumbHeight) tweenThumbHeight.stop();
			
			refreshScrollbar(null);
		}
		
		
		/**
		 * @inheritDoc
		 */
		override public function set height(value:Number):void {
			reinit(value);
		}
		
		/**
		 * This method is triggered by the target object through a "cursorUpdate" event.
		 * @param evt Event. If null, we adapt without tweening.
		 */
		private function refreshScrollbar(evt:Event):void {
			
			pos = myComponent.scrollPosV;
			max = myComponent.maxScrollPosV;
			
			if (pos<0) {
				pos = 0;
				myComponent.scrollPosV =0;
			}
			else if (pos>max) {
				pos = max;
				myComponent.scrollPosV = max;
			}
			else {
				myComponent.scrollPosV = pos;
			}
						
			if (evt == null) {
				thumbWrapper.y = scrollTrack_mc.y + (scrollTrack_mc.height- heightMe)*pos/Math.max(max,1);
			}
			adaptScrollThumbHeight(Math.max(20,scrollTrack_mc.height*heightMe/Math.max(max+heightMe,heightMe)), evt!=null);
			
		}
		
		private var tweenThumbHeight:Tween;
		private var tweenThumbPos:Tween;
		private var tweenHideShow:Tween;
		
		private var iamshown:Boolean = false;
		
		private function hidden(evt:Event):void {
			
			this.dispatchEvent(new Event("hideScrollbar"));
			this.visible = false;
		}
		private function shown(evt:Event):void {
			iamshown=  true;
			this.dispatchEvent(new Event("showScrollbar"));
		}
		
		/**
		 * Used for animation of the scroll thumb bar
		 */
		private function adaptScrollThumbHeight(height:Number, tween:Boolean = true):void {
			
			adaptScrollThumbPos(scrollTrack_mc.y + (scrollTrack_mc.height- height)*pos/Math.max(max,1));
			
			//if (scrollThumb_mc.height == height) return;
			
			
			
			if (iamshown && height >= scrollTrack_mc.height) {
				
				trace("hide scrollBAr"+height+" height, "+scrollTrack_mc.height+"scrolltrackheight");
				
				iamshown = false;
				if (tweenHideShow) tweenHideShow.stop();
				tweenHideShow = new Tween(this,"alpha", None.easeIn,this.alpha,0,0.8,true);
				tweenHideShow.addEventListener("motionFinish",hidden);
				
			}
			else if (!iamshown && height < scrollTrack_mc.height) {
				iamshown = true;
				if (tweenHideShow) tweenHideShow.stop();
				tweenHideShow = new Tween(this,"alpha", None.easeIn,this.alpha,1,0.8,true);
				tweenHideShow.addEventListener("motionFinish",shown);
				this.visible = true;
			}
			
			if (tweenThumbHeight) tweenThumbHeight.stop();
			
			
			
			if (tween) {
				tweenThumbHeight = new Tween(scrollThumb_mc,"height",None.easeIn,scrollThumb_mc.height,height,0.3,true);
				tweenThumbHeight.addEventListener("motionChange",updateScrollThumbHeight);				
			} else {
				scrollThumb_mc.height = height;
				thumbWrapper.x = scrollTrack_mc.x-1;
				
				thumbAddy_mc.y = scrollThumb_mc.height/2-thumbAddy_mc.height/2;
				thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2+2;
				
				thumbRect.height  = scrollTrack_mc.height - scrollThumb_mc.height;
			}

			
		
		}
		
		private function adaptScrollThumbPos(posi:Number):void {
			if (thumbWrapper.y == posi) return;

			if (tweenThumbPos) tweenThumbPos.stop();
			tweenThumbPos = new Tween(thumbWrapper,"y",None.easeIn,thumbWrapper.y,posi,0.3,true);
		}
			

		
		private function updateScrollThumbHeight(evt:Event):void {
			updateScrollThumb();
		}
		
		private function updateScrollThumb():void {
					
			
			thumbWrapper.x = scrollTrack_mc.x-1;
			
			thumbAddy_mc.y = scrollThumb_mc.height/2-thumbAddy_mc.height/2;
			thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2;
			
			thumbRect.height  = scrollTrack_mc.height - scrollThumb_mc.height;

		}
		

		
			
		/**
		 * Get triggered if someone uses the mouse wheel
		 */		
		private function mouseWheel(evt:MouseEvent):void {
			
			pos= pos-evt.delta*_wheelSpeed;
			if (pos<0) {
				pos = 0;
			}
			else if (pos>max) {
				pos = max;
			}
			myComponent.scrollPosV = pos;
			
			refreshScrollbar(evt);

		}
		
		
		/**
		 * Timing stuff for automatically retriggering if someone click on the scroll track
		 */
		private var trackClickTimer:Timer = null;
		private var waiter:Timer = null;
		
		private function firstDelay(evt:Event):void {
			trackClickTimer.start();
		}
		
		/**
		 * Someone clicks on the scroll track
		 */
		private function trackClickdown(evt:Event):void {
			
			stage.addEventListener(MouseEvent.MOUSE_UP, trackClickup,false,0,true);
			
			trackClick(evt);
			waiter.start();		
		}
		
		private function trackClickup(evt:Event):void {
			trackClickTimer.stop();
			waiter.stop();
			stage.removeEventListener(MouseEvent.MOUSE_UP, trackClickup);
		}
		
		private function trackClick(evt:Event):void {
			if (dragging) return;
		
			if (mouseY<thumbWrapper.y) pos-=myComponent.pageHeight;
			else if (mouseY>thumbWrapper.y+thumbWrapper.height) pos+=myComponent.pageHeight;
			
			if (pos<0) {
				pos = 0;
			}
			else if (pos>max) {
				pos = max;
			}
			myComponent.scrollPosV = pos;
			
			refreshScrollbar(evt);
			
			
		}
		

		/**
		 * If we dragged the ScroolThumb the target component has to adjust to the ne scrolling position.
		 */
		private function dragchange(evt:Event):void {

			
			pos  = Math.max(max,1)*Math.ceil(1000*(thumbWrapper.y-scrollTrack_mc.y)/Math.max(scrollTrack_mc.height- thumbWrapper.height,1))/1000;
			thumbAddy_mc.y = scrollThumb_mc.height/2-thumbAddy_mc.height/2;
			
			myComponent.scrollPosV = pos;
		}
		
		private var dragging:Boolean = false;
		
		private function startThumbDrag(evt:Event):void {
			thumbWrapper.startDrag(false, thumbRect);
			stage.addEventListener(MouseEvent.MOUSE_MOVE, dragchange);
			dragging = true;
		}
		
		private function stopThumbDrag(evt:Event):void {
			thumbWrapper.stopDrag();
			if (stage) stage.removeEventListener(MouseEvent.MOUSE_MOVE, dragchange);
			dragging = false;
		}
		
		
		
	}
	
	
}