<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'block_id' => '179',
  'type_id' => '2',
  'ordering' => '22',
  'm_connection' => 'core.index-member',
  'component' => NULL,
  'location' => '3',
  'disallow_access' => 'a:2:{i:0;s:1:"3";i:1;s:1:"5";}',
  'can_move' => '0',
  'module_id' => 'wenigoe',
  'source_parsed' => '<?php /* Cached: September 16, 2013, 1:36 pm */ ?>
<div class="block">
	<div class="title">My Legacy</div>
	<div class="content">
		<div class="modules">
			<div>
				<table class="table table-striped table-condensed">
					<tbody>
						<tr>
							<td>MEMORABLE MOMENTS<br></td>
						</tr>
						<tr>
							<td>
                                                                Most Memorable Moment:<br />
								<?php if ($this->_aVars[\'aLegacy\'][\'legacy_mem_mom\']): ?>
									<?php echo $this->_aVars[\'aLegacy\'][\'legacy_mem_mom\']; ?>
								<?php endif; ?>
								<br />
								Moment you wish to forget:<br>
									<?php if ($this->_aVars[\'aLegacy\'][\'legacy_mom_forg\']): ?>
										<?php echo $this->_aVars[\'aLegacy\'][\'legacy_mom_forg\']; ?>
									<?php endif; ?>
								<br />
								Most Memorable Person:<br />
									<?php if ($this->_aVars[\'aLegacy\'][\'legacy_mem_pers\']): ?>
										<?php echo $this->_aVars[\'aLegacy\'][\'legacy_mem_pers\']; ?>
									<?php endif; ?>
								<br />
								Greatest Achievement:<br />
									<?php if ($this->_aVars[\'aLegacy\'][\'legacy_grat_achiev\']): ?>
										<?php echo $this->_aVars[\'aLegacy\'][\'legacy_grat_acheiv\']; ?>
									<?php endif; ?>
								<br />
								Most important things I\'ve learned:<br />
									<?php if (aLegacy .legacy_things_learn): ?>
										<?php echo $this->_aVars[\'aLegacy\'][\'legacy_things_learn\']; ?>
									<?php endif; ?>
								<br />
								Important things to share with my family:<br />
									<?php if (aLegacy .legacy_imp_shar_fam): ?>
										<?php echo $this->_aVars[\'aLegacy\'][\'legacy_imp_shar_fam\']; ?>
									<?php endif; ?>
								<br />
							</td>
							<?php if (! $this->_aVars[\'onProfilePage\']): ?>
								<td>
								<a href="?do=/wenigoe">Update Legacy</a>
								</td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div><!--END CONTENT-->
</div><!-- END BLOCK -->',
); ?>