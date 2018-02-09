<div style="float:left"></div>
<?php if($total_page > 1){?>
  <nav>
  <ul class ="pagination justify-content-end">
  <li class="page-link">

    <a href="?controller=<?php echo $_GET['controller'] ?>&action=<?php echo $_GET['action']?>&page=1?>" aria-label="Previous">
      <span aria-hidden='true'>&laquo;</span>
    </a>
  </li>
<?php
  for($i=1;$i<=$total_page;$i++){?>
  <li class="page-link">
    <a href="?controller=<?php echo $_GET['controller'] ?>&action=<?php echo $_GET['action']?>&page=<?php echo $i?>"><?php echo $i?></a>
  </li>
  <?php } ?>
  <li class="page-link">
    <a href="?controller=<?php echo $_GET['controller'] ?>&action=<?php echo $_GET['action']?>&page=<?php echo $total_page?>" aria-label="Next">
      <span aria-hidden='true'>&raquo;</span>
    </a>
  </li>
  </ul>
  </nav>
  <?php }?>
  <style>
    .pagination{
      margin:0px !important;
    }
  </style>