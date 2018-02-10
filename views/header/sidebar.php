<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> จัดการข้าว <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="?controller=rice&action=index_riceSpecies">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการพันธุ์ข้าว
					</a></li>
					<li><a class="" href="?controller=rice&action=index_riceDisease">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการโรคข้าว
					</a></li>
					<li><a class="" href="?controller=rice&action=index_ricePathogen">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการเชื้อโรคข้าว
					</a></li>
					<li><a class="" href="?controller=rice&action=index_riceDiseasePathogen">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการคู่โรคและเชื้อสาเหตุ
					</a></li>
				</ul>
			</li>
			<li><a href="?controller=dep&action=index_dep"><em class="fa fa-building">&nbsp;</em> จัดการหน่วยงาน</a></li>
			<li><a href="?controller=user&action=index_userMm"><em class="fa fa-users">&nbsp;</em> จัดการผู้ใช้</a></li>
			<li class="parent"><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> จัดการที่อยู่ <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="?controller=district&action=index_district">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการอำเถอ
					</a></li>
					<li><a class="" href="?controller=subdistrict&action=index_subdistrict">
						<span class="fa fa-arrow-right">&nbsp;</span> จัดการตำบล
					</a></li>
				</ul>
			</li>
			<li><a href=""><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
</div><!--/.sidebar-->