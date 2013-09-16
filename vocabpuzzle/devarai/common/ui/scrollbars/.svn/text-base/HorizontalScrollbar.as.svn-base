package devarai.common.ui.scrollbars{
	
	import devarai.common.ui.scrollbars.IScrollBarH;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.utils.Timer;	
	import flash.filters.ColorMatrixFilter;
	import flash.filters.GlowFilter;
	import flash.geom.Rectangle;

	
	/**
	 * 
	 * This is a basic vertical scroll bar class
	 * 
	 */
	public class HorizontalScrollbar extends MovieClip {
		
		/**
		 * The target object for this scrollbar
		 */
		private var myComponent:IScrollBarH;
		
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
		 * The Width of the scrollbar
		 */
		private var widthMe:Number;
		
		/**
		
		/**
		
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
			thumbTw = new Tween(thumbGlow,"alpha",None.easeIn,thumbGlow.alpha,0.20,0.2,true);
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
		 * @param textf The target object that implements IScrollBarH.
		 * @param forceWidth The width of our scroll bar.
		 */
		public function HorizontalScrollbar(textf:IScrollBarH, forceWidth:Number) {
			
			
			
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

			scrollTrack_mc.x = 0;
			thumbWrapper.y = 3;
			thumbWrapper.x = 1;
			(myComponent as EventDispatcher).addEventListener("cursorUpdate",refreshScrollbar);
			(myComponent as EventDispatcher).addEventListener("cursorUpdateH",refreshScrollbar);
			
			thumbWrapper.addEventListener(MouseEvent.MOUSE_DOWN, startThumbDrag);
			
			this.addEventListener(Event.ADDED_TO_STAGE, addStageListeners);			
			
			
			scrollTrack_mc.addEventListener(MouseEvent.MOUSE_DOWN, trackClickdown);
			
			
			trackClickTimer = new Timer(85,0);
			waiter = new Timer(400,1);
			trackClickTimer.addEventListener(TimerEvent.TIMER, trackClick);
			waiter.addEventListener(TimerEvent.TIMER_COMPLETE,firstDelay);
			
			reinit(forceWidth);
			
			this.alpha = 0;
			this.visible = false;
			
		}

		/**
		 * If added to stage we set some listeners
		 */
		private function addStageListeners(evt:Event):void {
			stage.addEventListener(MouseEvent.MOUSE_UP, stopThumbDrag,false,0.0,true);
		}
		
		private function reinit(value:Number):void {
			
			widthMe = value;
			
			scrollTrack_mc.width = widthMe;
			thumbRect = new Rectangle(scrollTrack_mc.x,scrollTrack_mc.y,scrollTrack_mc.width - scrollThumb_mc.width,0);
			
			if (tweenThumbPos) tweenThumbPos.stop();
			if (tweenThumbWidth) tweenThumbWidth.stop();
			
			refreshScrollbar(null);
		}
		
		
		/**
		 * @inheritDoc
		 */
		override public function set width(value:Number):void {
			reinit(value);
		}
		
		/**
		 * This method is triggered by the target object through a "cursorUpdate" event.
		 * @param evt Event. If null, we adapt without tweening.
		 */
		private function refreshScrollbar(evt:Event):void {
			
			pos = myComponent.scrollPosH;
			max = myComponent.maxScrollPosH;
			
			if (pos<0) {
				pos = 0;
				myComponent.scrollPosH =0;
			}
			else if (pos>max) {
				pos = max;
				myComponent.scrollPosH = max;
			} else {
				myComponent.scrollPosH = pos;
			}
						
			if (evt == null) {
				thumbWrapper.x = scrollTrack_mc.x + (scrollTrack_mc.width- widthMe)*pos/Math.max(max,1);
				thumbWrapper.y = scrollTrack_mc.y;
			}
			adaptScrollThumbHeight(Math.max(20,scrollTrack_mc.width*widthMe/Math.max(max+widthMe,widthMe)), evt!=null);
			
		}
		
		private var tweenThumbWidth:Tween;
		private var tweenThumbPos:Tween;
		private var tweenHideShow:Tween;
		
		private var iamshown:Boolean = false;
		
		private function hidden(evt:Event):void {
			this.dispatchEvent(new Event("hideScrollbar"));
			myComponent.scrollPosH = 0;
			this.visible = false;
		}
		private function shown(evt:Event):void {
			this.dispatchEvent(new Event("showScrollbar"));
			myComponent.scrollPosH = 0;
		}
		
		/**
		 * Used for animation of the scroll thumb bar
		 */
		private function adaptScrollThumbHeight(width:Number, tween:Boolean = true):void {
			
			adaptScrollThumbPos(scrollTrack_mc.x + (scrollTrack_mc.width- width)*pos/Math.max(max,1));
			
			//if (scrollThumb_mc.width == width ) return;
			
			if (iamshown && width >= scrollTrack_mc.width) { 
				iamshown = false;				
				if (tweenHideShow) tweenHideShow.stop();
				tweenHideShow = new Tween(this,"alpha", None.easeIn,this.alpha,0,0.8,true);
				tweenHideShow.addEventListener("motionFinish",hidden);
				
			}
			else if (width < scrollTrack_mc.width && !iamshown){
				iamshown = true;
				if (tweenHideShow) tweenHideShow.stop();
				tweenHideShow = new Tween(this,"alpha", None.easeIn,this.alpha,1,0.8,true);
				tweenHideShow.addEventListener("motionFinish",shown);
				this.visible = true;
			}
			
			if (tweenThumbWidth) tweenThumbWidth.stop();
			
			if (!iamshown) return;
			
			if (tween) {
				tweenThumbWidth = new Tween(scrollThumb_mc,"width",None.easeIn,scrollThumb_mc.width,width,0.3,true);
				tweenThumbWidth.addEventListener("motionChange",updateScrollThumbHeight);				
			} else {
				scrollThumb_mc.width = width;
				thumbWrapper.y = scrollTrack_mc.y;
				
				thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2;
				//thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2+2;
				
				thumbRect.width  = scrollTrack_mc.width - scrollThumb_mc.width;
			}

			
		
		}
		
		private function adaptScrollThumbPos(posi:Number):void {
			if (thumbWrapper.x == posi) return;

			if (tweenThumbPos) tweenThumbPos.stop();
			tweenThumbPos = new Tween(thumbWrapper,"x",None.easeIn,thumbWrapper.x,posi,0.3,true);
		}
			

		
		private function updateScrollThumbHeight(evt:Event):void {
			updateScrollThumb();
		}
		
		private function updateScrollThumb():void {
					
			
			//thumbWrapper.x = scrollTrack_mc.x-1;
			
			thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2;
			//thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2;
			
			thumbRect.width  = scrollTrack_mc.width - scrollThumb_mc.width-1;

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
		
			if (mouseX<thumbWrapper.x) pos-=myComponent.pageWidth;
			else if (mouseX>thumbWrapper.x+thumbWrapper.width) pos+=myComponent.pageWidth;
			
			if (pos<0) {
				pos = 0;
			}
			else if (pos>max) {
				pos = max;
			}
			myComponent.scrollPosH = pos;
			
			refreshScrollbar(evt);
			
			
		}
		

		/**
		 * If we dragged the ScroolThumb the target component has to adjust to the ne scrolling position.
		 */
		private function dragchange(evt:Event):void {

			
			pos  = Math.max(max,1)*Math.ceil(1000*(thumbWrapper.x-scrollTrack_mc.x)/Math.max(scrollTrack_mc.width- thumbWrapper.width,1))/1000;
			thumbAddy_mc.x = scrollThumb_mc.width/2-thumbAddy_mc.width/2;
			
			myComponent.scrollPosH = pos;
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