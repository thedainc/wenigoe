package  devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.geom.Rectangle;
	import devarai.common.ui.tabbar.TabProxyHalb;
	import devarai.common.ui.tabbar.TabProxyHalb2;
	import devarai.common.ui.tabbar.TabProxy;
	import devarai.common.ui.tabbar.TabFrame;
	import devarai.common.ui.tabbar.ITabPanel;
	import devarai.common.ui.tabbar.TabPanel;
	import flash.events.Event;
	import flash.display.DisplayObject;
	
	import devarai.common.ui.tabbar.ITabBar;
	
	import flash.filters.DropShadowFilter;
	
	/**
	 * This is the main tab bar class.
	 */
	public class TabBar extends MovieClip implements ITabBar  {
		
		private var _breite:Number;
		private var _hoehe:Number;
		
		private var tempTF:TextField;
		
		private var unselL:Array = new Array(); // TabProxies
		private var unselR:Array = new Array();
		private var sel:Array= new Array();		
		
		private var contents:Array = new Array(); // of ITabPanel
		private var hidden:Array = new Array(); // of booleans
		
		
		
		private var unselLayerL:MovieClip;
		private var unselLayerR:MovieClip;
		private var selLayer:MovieClip;
		
		private var frame:TabFrame;
		
		
		private var selektiert:int = 0;
		
		
		/**
		 * Constructor.
		 */
		public function TabBar(breite:Number, hoehe:Number) {
			
			
			_breite = breite;
			_hoehe = hoehe;
			
			tempTF = new TextField();
			tempTF.multiline = false;
			tempTF.wordWrap = false;
			tempTF.embedFonts = true;
			
			selLayer = new MovieClip();
			unselLayerL = new MovieClip();
			unselLayerR = new MovieClip();
			
			this.addChild(unselLayerL);
			this.addChild(unselLayerR);
			this.addChild(selLayer);
			
			
			frame = new TabFrame();
			frame.width = breite;
			frame.height = hoehe;
			frame.y = 29;
			frame.x = 1.5;
			
			//selLayer.addChildAt(frame,0);
			
			var filt:DropShadowFilter = new DropShadowFilter(0,0,0x000000,0.45,3,3,7,3);
			var filt2:DropShadowFilter = new DropShadowFilter(2,140,0x000000,0.3,6,7,0.6,3);
			selLayer.filters = [filt,filt2];
			
		}
		
		/**
		 * Hides a tab
		 */
		public function hideTab(panel:ITabPanel):void {
			var hideIndex:int = -1;
			
			for (var i = 0; i<contents.length; i++) {
				if (contents[i] == panel) {
					hideIndex = i;
					break;
				}
			}
			
			if (hideIndex!=-1) hidden[hideIndex] = true;
			refreshBar();
		}
		
		/**
		 * Show3s a tab.
		 */
		public function showTab(panel:ITabPanel):void {
			var hideIndex:int = -1;
			
			for (var i = 0; i<contents.length; i++) {
				if (contents[i] == panel) {
					hideIndex = i;
					break;
				}
			}
			
			if (hideIndex!=-1) {
				hidden[hideIndex] = false;
				
				contents[selektiert].onHide();
				selektiert= hideIndex;
				refreshBar();
				(contents[selektiert] as ITabPanel).onShow();
			} 
			
			refreshBar();
		}
		
		
		/**
		 * Adds a tab panel to the tab bar.
		 */
		public function addTab(titel:String,panel:ITabPanel):void {
			
			tempTF.width = 1000;
			tempTF.text = titel;
			var tf:TextFormat = new TextFormat();
			tf.font = "Arial";
			tf.size = 14;
			tempTF.setTextFormat(tf);
			var rect:Rectangle = null;
			var n:int = tempTF.length-1;
			while (n>=0 && rect == null) { rect = tempTF.getCharBoundaries(n); n--;}
			
			if (n<0) return;
			if (panel==null) return;
			
			
			hidden.push(false);
			
			contents.push(panel);
			panel.tabBar = this;
			(panel as DisplayObject).visible = false;
			
			var myBreite:Number = rect.x+rect.width+48;
			
			var prox:TabProxyHalb = new TabProxyHalb();
			
			prox.width = myBreite;
			prox.text = /*panel.*/titel;
			
			unselL.push(prox);
			
			var prox2:TabProxyHalb2 = new TabProxyHalb2();
			
			prox2.width = myBreite+15;
			prox2.text = /*panel.*/titel;
			
			unselR.push(prox2);
			
			var selP:TabProxy = new TabProxy();
			
			selP.width = myBreite+12;
			selP.text = /*panel.*/titel;
			
			sel.push(selP);
			
			selP.addEventListener("passOnKey",selClick);
			prox.addEventListener("passOnKey",unselClick);
			prox2.addEventListener("passOnKey",unselClick);
			
			prox.visible = false;
			prox2.visible = false;
			selP.visible = false;
			
			refreshBar();
		}
		
		/**
		 * Someone clicked on the selected tab
		 */
		private function selClick(evt:Event):void {
			
			var posX:Number = this.mouseX-(sel[selektiert].x+sel[selektiert].width-38);
			var posY:Number = this.mouseY-sel[selektiert].y;
			
			if (selektiert<sel.length-1 && posX>0 && posY<=posX) { 
				
				contents[selektiert].onHide();
				selektiert++;
				refreshBar();
				(contents[selektiert] as ITabPanel).onShow();
			}
			
		}
		
		/***
		 * Gives the selected tab panel.
		 */
		public function getSelectedPanel():ITabPanel {
			return contents[selektiert];
		}
		
		/**
		 * A unselected tab got clicked. So switch panels.
		 */
		private function unselClick(evt:Event):void {
			var which:int = -1;
			
			var isL:Boolean = false;
			
			for (var i:int = 0; i<unselR.length && which==-1; i++) if (unselR[i]==evt.currentTarget) { which = i; }
			for (i = 0; i<unselR.length && which==-1; i++) if (unselL[i]==evt.currentTarget) { which = i; isL = true;}
			
			if (which==-1) return;
			
			contents[selektiert].onHide();
			
			selektiert = which;
			
			
			var posX:Number;
			
			if (isL) posX = this.mouseX-(unselL[selektiert].x+unselL[selektiert].width-3);
			else posX = this.mouseX-(unselR[selektiert].x+unselR[selektiert].width-3);
			
			if (selektiert<sel.length-1 && posX>0 ) { 
				selektiert++;
				
			}
			
			refreshBar();
			
			(contents[selektiert] as ITabPanel).onShow();
			
		}
		
		/**
		 * Refreshes the tab bar and its symbols.
		 */
		private function refreshBar():void {
			
			var i:int;
			
			for (i = 0 ; i<unselL.length; i++) { unselL[i].visible = false; unselR[i].visible = false; sel[i].visible = false;}
			var xpos:Number = 0;
			i = 0
			for (; i<selektiert; i++) {
				if (hidden[i]) continue;
				unselLayerL.addChild(unselL[i]);			
				unselL[i].x = xpos-3;
				unselL[i].y = 2;
				unselL[i].visible = true;
				xpos+=unselL[i].width-15;
			}
			
			selLayer.addChild(sel[i]);
			sel[i].x = xpos;
			sel[i].y = -1;
			sel[i].visible = true;
			xpos+=sel[i].width;
			
			selLayer.addChildAt((contents[i] as DisplayObject),0);
			(contents[i] as DisplayObject).x = 3;
			(contents[i] as DisplayObject).y = 29;
			(contents[i] as DisplayObject).visible = true;
			
			for (var j:int = 0 ; j<unselL.length; j++) if (j!=i) contents[j].visible = false;
			
			i++;
			
			if (i>=unselL.length) return;
			
			while (i<unselL.length && hidden[i]) i++;
			
			if (i>=unselL.length) return;
			
			unselLayerR.addChildAt(unselR[i],0);			
			unselR[i].x = xpos-39;
			unselR[i].y = 2;
			xpos+=unselR[i].width-39;
			unselR[i].visible = true;
			i++;
			
			for (; i<unselL.length; i++) {
				if (hidden[i]) continue;
				unselLayerR.addChildAt(unselR[i],0);			
				unselR[i].x = xpos-20;
				unselR[i].y = 2;
				xpos+=unselR[i].width-20;
				unselR[i].visible = true;
			}
			
			
			
		}
		
		
	}
	
	
	
	
}