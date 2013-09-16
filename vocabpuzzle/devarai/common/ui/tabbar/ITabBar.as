package  devarai.common.ui.tabbar {
	
	import devarai.common.ui.tabbar.ITabPanel;
	
	public interface ITabBar {
		
		/**
		 * Adds a tab panel to the tab bar.
		 */
		function addTab(titel:String,panel:ITabPanel):void;
		/**
		 * Gives the selected panel.
		 */
		function getSelectedPanel():ITabPanel;
		/**
		 * Hides a tab from the tab bar.
		 */
		function hideTab(panel:ITabPanel):void;
		/**
		 * Shows again a tab in the tab bar.
		 */
		function showTab(panel:ITabPanel):void;


	}
	
}