package devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	import devarai.common.ui.tabbar.ITabBar;
	
	/**
	 * A tab panel with content.
	 */
	public class TabPanel extends MovieClip implements ITabPanel {
		
		protected var _titel:String = "Test";
		
		private var _tabbar:ITabBar;
		
		
		/**
		 * Sets the tab bar.
		 */
		public function set tabBar(v:ITabBar):void {
			_tabbar = v;
		}
		/**
		 * Gives the tab bar.
		 */
		public function get tabBar():ITabBar {
			return _tabbar;
		}

		/**
		 * Gives the title.
		 */
		public function get titel():String {
			return _titel;
		}
		/**
		 * Sets the title.
		 */
		public function set titel(t:String):void {
			_titel = t;
		}
		
		/**
		 * Inits the panel with some parameters.
		 */
		public function init(param:Object=null):void {
		}
		
		/**
		 * De-initializes the panel.
		 */
		public function deInit():void {}
		
		/**
		 * Executed when the panel is shown.
		 */
		public function onShow():void {};
		/**
		 * Executed when the panel hides.
		 */
		public function onHide():void {}
		/**
		 * Does a roll back.
		 */
		public function rollBack():void {};
		/**
		 * Persists the panel state
		 */
		public function save():void {}
		/**
		 * Restores the panel state
		 */
		public function restore():void {}
		
		
	}
	
	
	
}