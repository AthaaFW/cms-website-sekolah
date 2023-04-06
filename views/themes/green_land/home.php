<!-- CONTENT -->
<div class="col-lg-8 col-md-8 col-sm-12 ">
	<!-- TULISAN POPULER -->
	<?php $query = get_latest_posts(5); if ($query->num_rows() > 0) { ?>
		<h5 class="page-title mb-3">Tulisan Terbaru</h5>
		<?php foreach($query->result() as $row) { ?>
			<div class="card rounded-0 border border-secondary mb-3">
				<div class="row">
					<div class="col-md-5">
						<img src="<?=base_url('media_library/posts/medium/'.$row->post_image)?>" class="card-img rounded-0" alt="<?=$row->post_title?>">
					</div>
					<div class="col-md-7">
						<div class="card-body">
							<h5 class="font-weight-bold"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h5>
							<small class="text-muted card-tgl"><?=date('d/m/Y H:i', strtotime($row->created_at))?> - Oleh <?=$row->post_author?> - Dilihat <?=$row->post_counter?> kali</small>
							<div class="d-flex flex-column gap-3 align-items-start mt-1">
								<p class="card-text mb-0"><?=substr(strip_tags($row->post_content), 0, 165)?></p>
								<a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>" class="btn btn-sm action-button rounded-pill mt-3 px-3 py-2">Selengkapnya</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>

	<!-- Photo Terbaru -->
	<?php $query = get_albums(4); if ($query->num_rows() > 0) { ?>
		<h5 class="page-title mt-3 mb-3">Foto Terbaru</h5>
		<div class="row">
			<?php foreach($query->result() as $row) { ?>
				<div class="col-md-6 mb-3">
					<div class="card rounded-0 img-card">
						<img src="<?=base_url('media_library/albums/'.$row->album_cover)?>" class="rounded-0 img-fluid" width="220px" height="220px">
						<div class="img-detail smooth">
							<h5 class="text-center"><?=$row->album_title?></h5>
							<p class="card-text"><?=$row->album_description?></p>
							<button type="button" onclick="photo_preview(<?=$row->id?>)" class="btn action-button rounded-circle "><i class="fa fa-search"></i></button>
						</div>
						<!-- <div class="card-body pb-2">
							<h5 class="card-title"><?=$row->album_title?></h5>
							<p class="card-text"><?=$row->album_description?></p>
						</div>
						<div class="card-footer">
							<button type="button" onclick="photo_preview(<?=$row->id?>)" class="btn action-button rounded-0 float-right"><i class="fa fa-search"></i></button>
						</div> -->
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<!-- Video Terbaru -->
	<?php $query = get_videos(2); if ($query->num_rows() > 0) { ?>
		<h5 class="page-title mt-3 mb-3">Video Terbaru</h5>
		<div class="row">
			<?php foreach($query->result() as $row) { ?>
				<div class="col-md-6 mb-3">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$row->post_content?>" allowfullscreen></iframe>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>

<?php $this->load->view('themes/green_land/sidebar')?>
