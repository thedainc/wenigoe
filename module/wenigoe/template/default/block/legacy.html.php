<?php 	
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		Wenigoe
 * @author  		Jesse Griffin
 * @package 		Wenigoe
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<link href="/theme/frontend/default/template/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/theme/frontend/default/template/css/bootstrap-responsive.css" rel="stylesheet">

<div class="block">
<div class="title">My Legacy</div>
<div class="content">
<div class="modules">
<div id="accordion2" class="accordion">
<div class="accordion-group">
<div class="accordion-heading">
<div>
<table class="table table-striped table-condensed">
<thead>
<tr>

<th>Item</th>
<th>
<a class="accordion-toggle" href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse">∇</a>
</th>
</tr>
</thead>
<tbody>
<tr>
<td>
MEMORABLE MOMENTS<br>
	{if $aLegacy.legacy_mem_mom}
		{$aLegacy.legacy_mem_mom}
	{/if}
</td>
</tr>

</tbody>
</table>
</div>
</div>
<div id="collapseTwo" class="accordion-body collapse">
<div class="accordion-inner">
<table class="table table-striped table-condensed">
<tbody>
<tr>

<td>
Moment you wish to forget:<br>
	{if $aLegacy.legacy_mom_forg}
		<li>{$aLegacy.legacy_mom_forg}</li>
	{/if}
<br />
Most Memorable Person:<br />
	{if $aLegacy.legacy_mem_pers}
		<li>{$aLegacy.legacy_mem_pers}</li>
	{/if}
<br />
Greatest Achievement:<br />
	{if $aLegacy.legacy_grat_achiev}
		<li>{$aLegacy.legacy_grat_acheiv}</li>
	{/if}
<br />
Most important things I've learned:<br />
	{if aLegacy.legacy_things_learn}
		<li>{$aLegacy.legacy_things_learn}</li>
	{/if}
<br />
Important things to share with my family:<br />
	{if aLegacy.legacy_imp_shar_fam}
		<li>{$aLegacy.legacy_imp_shar_fam}</li>
	{/if}
<br />
</td>
{if !$onProfilePage}
	<td>
	<a href="">Update Legacy</a>
	</td>
{/if}
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div><!--END CONTENT-->
</div><!-- END BLOCK -->
    <script src="/theme/frontend/default/template/js/jquery.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap.min.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-transition.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-alert.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-modal.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-dropdown.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-scrollspy.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-tab.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-tooltip.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-popover.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-button.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-collapse.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-carousel.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-typeahead.js"></script>
    <script src="/theme/frontend/default/template/js/jquery.iphone.toggle.js"></script>