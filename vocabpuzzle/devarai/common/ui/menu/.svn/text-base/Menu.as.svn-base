package devarai.common.ui.menu {
	import devarai.common.ui.IContentElement;
	import devarai.common.ui.menu.MenuRow;
	import devarai.common.ui.scrollbars.IScrollBar;
	import devarai.common.ui.scrollbars.VerticalScrollbar;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.BevelFilter;
	import flash.filters.DropShadowFilter;
	import flash.filters.GlowFilter;
	import flash.geom.Rectangle;
	import flash.text.TextField;
	import flash.text.TextFormat;
	
	/**
	 * This is the menu class.
	 * It can show e.g. the clues.
	 */
	public class Menu extends MovieClip implements IScrollBar {
		
		/**
		 * Background sprite for the menu
		 */
		private var background:Sprite = new Sprite();
		// Menu mask
		private var maske:Sprite = new Sprite();
		// All the entries of the menu
		private var rows:Vector.<IMenuRow> = new Vector.<IMenuRow>();
		// Wraps arround the rows and takes the mask
		private var rowsWrapper:Sprite = new Sprite();
		
		/**
		 * The width of the menu.
		 */
		private var myWidth:Number = 223;
		/**
		 * The height of the menu.
		 */
		private var myHeight:Number  = 0;

		/**
		 * The scrollbar.
		 */
		private var scrollbarV:VerticalScrollbar;
		
		/**
		 * @inheritDoc
		 */
		override public function get width():Number {
			return myWidth+4;
		}
		
		
		/**
		 * This method highlights the cell for a special clue etc.
		 */
		public function markRed(w:IContentElement):void {
			var i:int;
			for (i  = 0; i<rows.length; i++) {
				if (rows[i].theContent == w) {
					rows[i].redMarker = true;
					
					this.scrollPosV = Math.max(0,(rows[i] as Sprite).y+(rows[i] as Sprite).height/2-this.maske.height/2);
					this.dispatchEvent(new Event("cursorUpdate"));
					
				} else {
					rows[i].redMarker = false;
				}
			}			
		}
		
		/**
		 * Gives the content element of row i.
		 */
		public function contentAtPos(i:int):IContentElement {
			if (i<0 || i>=rows.length) return null;
			
			return rows[i].theContent;
		}
		
		/**
		 * This method highlights the cell for a special clue.
		 */
		public function markLight(w:IContentElement):void {
			var i:int;
			for (i  = 0; i<rows.length; i++) {
				if (rows[i].theContent == w) {
					rows[i].lightMarker = true;
					
					this.scrollPosV = Math.max(0,(rows[i] as Sprite).y+(rows[i] as Sprite).height/2-this.maske.height/2);
					this.dispatchEvent(new Event("cursorUpdate"));
					
				} else {
					rows[i].lightMarker = false;
				}
			}			
		}
		
		
		
				
		
			
		/**
		 * Empties the whole menu.
		 */
		public function clear():void {
			var i:int;
			for (i  = 0; i<rows.length; i++) {
				rowsWrapper.removeChild(rows[i] as Sprite);
				rows.splice(i,1);
				i--;
			}
			var anY:Number = 0;
			this.dispatchEvent(new Event("cursorUpdate"));			
		}
		
		/**
		 * Adds a clue... to the menu at the bottom.
		 * @param w The word/clue/content to be added.
		 */
		public function addWord(w:IContentElement):void {
			rows.push(new rowClass(this.myWidth+2, w));
			rowsWrapper.addChild(rows[rows.length-1] as Sprite);
			var anY:Number = 0;
			if (rows.length>1) {
				anY = (rows[rows.length-2] as Sprite).y+(rows[rows.length-2] as Sprite).height;
			}
			(rows[rows.length-1] as Sprite).y = anY;		
			
			
			(rows[rows.length-1] as Sprite).addEventListener("someoneClicked", clickOnRow);
			
			this.dispatchEvent(new Event("cursorUpdate"));
		}
		
		
		
		private var fctOnClick:Function;
		private var rowClass:Class;
		
		/**
		 * Constructor.
		 * @param _sc A reference to the main class.
		 * @param _height The desired height of the menu
		 */
		public function Menu(_height:Number,_width:Number,_fct:Function, _rowClass:Class) {
			
			this.rowClass = _rowClass;
			
			this.fctOnClick = _fct;
			
			this.myWidth = _width;

			this.myHeight = _height;
			
			var i,j:int;
			
			// Create the background
			
			background.graphics.beginFill(0xf1f1f1,0.9);
			background.graphics.lineStyle(1,0x333333,0.3);
			background.graphics.drawRect(0,0,myWidth,_height	);			
			background.graphics.endFill();
			
			var filt:GlowFilter = new GlowFilter(0,0.1,1,1,5,3);
			//this.filters = [filt];
			//background.filters = [new BevelFilter(0,230,0,0.88,0,0.88,1,1,2,3)];
			
			// Create the mask
			
			this.maske.graphics.beginFill(0);
			this.maske.graphics.drawRect(0,0,myWidth-1,_height-4);
			this.maske.graphics.endFill();
			
			// Add things...
			
			this.addChild(maske);
			rowsWrapper.mask = maske;
			
			this.addChild(background);
			
			this.addChild(rowsWrapper);
			
			rowsWrapper.cacheAsBitmap = true;
			this.cacheAsBitmap = true;
			
			rowsWrapper.x = 2;
			rowsWrapper.y = 1;
			
			maske.x = 1;
			maske.y = 1;
			
			
			// Set up the scroll bars
			
			scrollbarV = new VerticalScrollbar(this,_height-6);
			this.addChild(scrollbarV);
			scrollbarV.x = myWidth-12;
			scrollbarV.y = 5;
			
			
			scrollbarV.addEventListener("showScrollbar", showVScrollbar);
			scrollbarV.addEventListener("hideScrollbar", hideVScrollbar);
			
			

						
			this.dispatchEvent(new Event("cursorUpdate"));
			
			
		}
		
		/**
		 * Gets triggered if someone clicke on a menu element.
		 */
		private function clickOnRow(evt:Event):void {
					
			var row:MenuRow = evt.currentTarget as MenuRow;
			
			if (!row.redMarker) {
				row.redMarker = true;
				if (this.fctOnClick != null) this.fctOnClick.call(null,row.theContent);
				
				
			
			}
		}
		
		
		/**
		 * Vertical scrollbar needed.
		 */
		private function showVScrollbar(evt:Event):void {
			maske.width = myWidth-2-10;
			this.dispatchEvent(new Event("cursorUpdateH"));
		}
		/**
		 * Vertical scrollbar can disappear.
		 */
		private function hideVScrollbar(evt:Event):void {
			maske.width = myWidth-1;
			this.dispatchEvent(new Event("cursorUpdateH"));
		}
		
		
		/**
		 * Scrolling tweens
		 */
		private var tw:Tween = null;
		
		/**
		 * @private
		 */
		public var newScrollPos:Number = 0;
		
		/**
		 * This method is relevant if we have more rows than height. So we have to scroll.
		 */
		
		/**
		 * This gives you the a vertical scroll position
		 * @return position
		 */		
		public function get scrollPosV():Number {
			return newScrollPos;
		};
		/**
		 * This sets a vertical scroll position
		 * @param n Position (>=0 and <=maxScrollPosV())
		 * @see IScrollBar#maxScrollPosV()
		 */
		public function set scrollPosV(n:Number):void {
			
			if (tw) tw.stop();
			newScrollPos = Math.max(0,Math.min(n,rowsWrapper.height-this.maske.height));
			tw = new Tween(rowsWrapper,"y",None.easeIn, rowsWrapper.y,-newScrollPos+1,0.2,true);
			
		}
		/**		
		 * Gives you the maximum possible scroll position.
		 * @return Max. scroll position.
		 */
		public function get maxScrollPosV():Number {
			return Math.max(rowsWrapper.height-this.maske.height,0);
		}
		
		/**
		 * Scrolling page height in pixels.
		 */
		public function get pageHeight():Number {
			return this.maske.height;
		}
		
		
	}
	
	
}