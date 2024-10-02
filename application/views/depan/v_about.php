<div class="event_details_area section__padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_event d-flex align-items-center">
                    <div class="thumb">
                        <img src="<?php echo base_url('uploads/' . $about->image); ?>" alt="Event Image">
                        <div class="date text-center">
                            <h4><?php echo date('d', strtotime($about->date)); ?></h4>
                            <span><?php echo date('F, Y', strtotime($about->date)); ?></span>
                        </div>
                    </div>
                    <div class="event_details_info">
                        <div class="event_info">
                            <a href="#">
                                <h4><?php echo $about->title; ?></h4>
                             </a>
                            <p>
                                <span> <i class="flaticon-clock"></i> <?php echo date('h:i a', strtotime($about->time)); ?></span> 
                                <span> <i class="flaticon-calendar"></i> <?php echo date('d M Y', strtotime($about->date)); ?></span> 
                                <span> <i class="flaticon-placeholder"></i> <?php echo $about->location; ?></span>
                            </p>
                        </div>
                        
                        <?php echo nl2br($about->content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
