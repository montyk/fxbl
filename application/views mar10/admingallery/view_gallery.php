
<!--START:: GALLERY VIEW -->

<!-- Button to trigger modal -->
<a href="#view_gallery_modal" role="button" class="btn bs" data-toggle="modal">View Gallery</a>


<!-- Modal -->
<div id="view_gallery_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="view_gallery_modalLabel" aria-hidden="true">
  <div class="modal-header">
        <button type="button" class="close modal_close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="view_gallery_modalLabel">Media Gallery</h3>
  </div>
  <div class="modal-body">
      <div>
          <p>Select a media</p>
          <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
            <?php $images=$this->adminwidget_model->getGalleryImages(); ?>
            <?php // echo '<pre>'; print_r($images); echo '</pre>'; ?>
            <?php if (!empty($images)){ foreach ($images AS $k => $v) { ?>
                <a href="<?php echo $v->url; ?>" title="<?php echo $v->name; ?>" data-gallery="gallery" class="media_gallery_item">
                      <img src="<?php echo base_url($v->url); ?>" width="80" />
                      <input type="hidden" class="embed_code hide" value='<img src="<?php echo base_url($v->url); ?>" width="80" />' />
                      <input type="hidden" class="image_link hide" value='<?php echo base_url($v->url); ?>' />
                </a>
            <?php } }else{?>
                <div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      No Media/Images uploaded.
                </div>
            <?php } ?>
          </div>
          <div class="gallery_item_details">
              <div class="form-search">
                  
                  <div class=" ">
                      Source Code: <input type="text" class="search-query disabled display_embed_code" />
<!--                      <button type="submit" class="btn bs disabled"><i class="icon-share"></i> Copy widget embed code to clipboard</button>-->
                      <a href="#" class="popover_this" data-trigger="hover" data-toggle="popover" data-placement="top" title="" data-content="Copy this code and place this in SOURCE CODE of your page to get this image/media in your page."><i class="icon-info-sign"></i></a>
                  </div>
                  <br/>
                  <div class=" ">
                      Image URL: <input type="text" class="search-query disabled display_image_link" />
                      <a href="#" class="popover_this" data-trigger="hover" data-toggle="popover" data-placement="top" title="" data-content="Image Src URL."><i class="icon-info-sign"></i></a>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button class="btn bs modal_close" data-dismiss="modal" aria-hidden="true" type="button">Close</button>
  </div>
</div>

<style type="text/css">
    .gallery_item_details{
        margin: 10px;
    }
    
</style>


<script type="text/javascript">
    $(function(){
       $('.tooltip_this').tooltip();
       $('.popover_this').popover();
       $('.media_gallery_item').live('click',function(event){
           event.preventDefault();
           embedCode=$(this).find('.embed_code').val();
           $('.display_embed_code').val(embedCode);
           imageLink=$(this).find('.image_link').val();
           $('.display_image_link').val(imageLink);
           $('.gallery_item_details').find('.disabled').removeClass('disabled');
       })
    });
</script>

<!--END:: GALLERY VIEW -->