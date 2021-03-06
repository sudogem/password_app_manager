<div class="title title-spacing" >
    <?php echo (isset($view_user_access) && $view_user_access) ? "<h2>All domain access of {$view_user_access}</h2>" : "<h2>All domains access</h2>" ?>
</div>

<?php !empty($flash) ? flash($flash) : '' ?>

<ul class="toolbar2" >
<!--<li><a href="<?= site_url('admin/domain/export/') ?>"  ><img src="<?= THEMEPATH_IMG ?>export12.png" />Export CSV</a></li>
<li><a href="<?= site_url('admin/domain/import/') ?>" ><img src="<?= THEMEPATH_IMG ?>import12.png" />Import CSV</a></li>
<li><a href="<?= site_url('admin/domain/export/xml') ?>"  ><img src="<?= THEMEPATH_IMG ?>export12.png" />Export XML</a></li>
<li><a href="<?= site_url('admin/domain/import/xml') ?>" ><img src="<?= THEMEPATH_IMG ?>import12.png" />Import XML</a></li>
-->
<li><a href="<?= site_url('admin/domain/customfield/') ?>" ><img src="<?= THEMEPATH_IMG ?>128_add.png" />Create domain custom field</a></li>
<li><a href="<?= site_url('admin/domain/search/') ?>" ><img src="<?= THEMEPATH_IMG ?>126_search.png" />Search domain</a></li>
<li><a href="<?= site_url('admin/domain/form/') ?>" ><img src="<?= THEMEPATH_IMG ?>126_add.png" />Create domain</a></li>
</ul>

<div class="clearfix"></div>

<?php
$uri = $this->uri->uri_to_assoc(2);
$uri['field'] = isset($uri['field']) ? $uri['field'] : '';

$arrow1 = (($uri['field'] == 'project') && $sortby == 'asc') ? 'arrowdown' : (($uri['field'] == 'project') ? 'arrowup' : '') ;
$arrow2 = (($uri['field'] == 'acctype') && $sortby == 'asc') ? 'arrowdown' : (($uri['field'] == 'acctype') ? 'arrowup' : '') ;
$arrow3 = (($uri['field'] == 'changefreq') && $sortby == 'asc') ? 'arrowdown' : (($uri['field'] == 'changefreq') ? 'arrowup' : '') ;
?>
  <div class="groupby2" >
    <ul>
<!--    <li><a href="<?php echo site_url('admin/domain/department') ?>" >Group by Department</a></li>
-->    <li><a href="<?php echo site_url("admin/domain/browse/field/project/sort/$sortby") ?>" class="<?= $arrow1 ?>" >Group by Project</a></li>
    <li><a href="<?php echo site_url("admin/domain/browse/field/acctype/sort/$sortby") ?>" class="<?= $arrow2 ?>" >Group by Type</a></li>
    <li><a href="<?php echo site_url("admin/domain/browse/field/changefreq/sort/$sortby") ?>" class="<?= $arrow3 ?>" >Group by Frequency</a></li>
    </ul>
    </div>
   <div class="clearfix"></div>

<div class="hastable"  >
<table width="100%" border="1"  id="sort-table" >
<thead>
  <tr>
    <th width="17%">Domain</th>
    <th width="4%">Type</th>
    <th width="8%">Visit</th>
    <th width="9%">Importance</th>
    <th width="11%">URL</th>
    <th width="8%">Username</th>
    <th width="8%">Change<br />frequency </th>
    <th width="13%">Expire</th>
    <th width="16%">Last Changed</th>
    <th width="6%">&nbsp;</th>
  </tr>
</thead>
<?php
$alt = 0;
if ($results) {
  // echo '<pre>';
  // print_r($results);
  // echo '</pre>';
foreach($results as $v):
// print_r($v);
$id = $v['domain_id'];
$expirydate = ($v['expirydate'] == '' or $v['expirydate'] == 0) ? '' : date("M d, Y g:i a", $v['expirydate']) ;
$linkurl = prep_url($v['url']) or '';
$linkurl = site_url("admin/domain/dologin/$id");
$last_modified = ! empty($v['last_modified']) ? date('M d, Y g:i a', $v['last_modified']) : '' ;
$atts = array(
              'width'      => '400',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );


?>
  <tr class="<?= (++$alt%2 == 0) ?  'alt' : '' ?>">
    <td><?= $v['project'] ?></td>
    <td><?= $v['acctype'] ?></td>
    <td><?php if($linkurl):?>
      <a href="<?= $linkurl ?>" target="_blank" >Visit URL</a>
      <?php endif;?></td>
    <td><?= $v['importance'] ?></td>
    <td><?= $v['url'] ?></td>
    <td><?= $v['username']  ?></td>
    <td><?= $v['changefreq'] ?></td>
    <td><?= $expirydate ?></td>
    <td><?= $last_modified  ?></td>
    <td>
<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this access" href="<?php echo site_url("admin/domain/form/$id") ?>" >
<span class="ui-icon ui-icon-wrench"></span>
</a>

<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="view full details" href="<?php echo site_url("admin/domain/view/$id") ?>" >
<span class="ui-icon ui-icon-circle-zoomin"></span>
</a>

<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="People who access" href="<?php echo site_url("admin/domain/assign_user_project/$id") ?>" >
<span class="ui-icon ui-icon-person"></span>
</a>

<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete this access" href="<?php echo site_url("admin/domain/delete/$id") ?>" onclick="return confirm('Are you sure you want to delete?')" >
<span class="ui-icon ui-icon-circle-close"></span></a>

</td>
  </tr>
<?php endforeach; ?>
<?php } else {?>
<tr><td colspan="10"><div align="center">No records found.</div></td></tr>
<?php } ?>

</table>
</div>

<div class="clearfix"></div>
<ul class="pagination">
<?php echo isset($pagination) ? $pagination : '' ?>
</ul>
