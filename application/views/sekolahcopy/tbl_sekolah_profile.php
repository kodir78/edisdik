 <div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Profil Sekolah</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="rows">
            <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
             <div class="x_panel">
              <div class="x_title">
                <h2>Data Umum</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="profile_img">
                  <div id="crop-avatar" align="center" >
                    <!-- Current avatar -->
                    <img class="avatar-view img-responsive img-rounded" src="<?php echo base_url()?>assets/logo_lembaga/<?php echo getInfoSM('logo');?>" width="150px">
                  </div>
                </div>
                <h3 class="text-center"><?php echo $nama_sekolah; ?></h3>
                <ul class="list-unstyled user_data">
                  <li>NPSN <?php echo form_error('npsn') ?> <a class="pull-right"><?php echo $npsn; ?></a>
                  </li>

                  <li>
                    NSS <?php echo form_error('nss') ?> <a class="pull-right"><?php echo $nss; ?></a>
                  </li>

                  <li class="m-top-xs">
                   Bentuk Pendidikan <?php echo form_error('id_bentuk_sekolah') ?> <a class="pull-right"><?php echo $id_bentuk_sekolah; ?></a>
                 </li>
                 <li class="m-top-xs">
                   Akreditasi <?php echo form_error('nilai_akreditasi') ?> <a class="pull-right"><?php echo $nilai_akreditasi; ?></a>
                 </li>
                 <li class="m-top-xs">
                   Kepala Sekolah <a class="pull-right"><?php echo $this->session->userdata('full_name'); ?></a>
                 </li>
               </ul>

               <a class="btn btn-sm btn-success"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
               <br />

             </div>
           </div>

           <div class="x_panel">
            <div class="x_title">
              <h2><strong><i class="fa fa-book margin-r-5"></i>  Kontak</strong></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <ul class="list-unstyled user_data">
                <li>Telepon : <?php echo $no_tlp; ?>
                </li>

                <li>
                  NSS <?php echo form_error('nss') ?> <a class="pull-right"><?php echo $nss; ?></a>
                </li>

                <li class="m-top-xs">
                 Fax : <?php echo $no_fax; ?>
               </li>
               <li class="m-top-xs">
                 HP : <?php echo $hp; ?>
               </li>
               <li class="m-top-xs">
                 Email : <?php echo $email; ?>
               </li>
               <li class="m-top-xs">
                 Website : <?php echo $website; ?>
               </li>
             </ul>
             <br />
           </div>
         </div>
         <!-- end of skills -->
         <!-- Location -->
         <div class="x_panel">
          <div class="x_title">
            <h2><strong><i class="fa fa-map-marker margin-r-5"></i>  Lokasi</strong></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            Alamat :   <?php echo $alamat; ?>, RT <?php echo $rt; ?> RW <?php echo $rw; ?> <br>
            Dusun :  <?php echo $dusun; ?> <br>
            Kode POS : <?php echo $postal_code; ?> <br>
            Desa/Kelurahan : <?php echo ucwords($id_villages); ?> <br>
            Kecamatan : <?php echo ucwords($id_districts); ?> <br>
            Kabupaten/Kota : <?php echo ucwords($regency_id); ?> <br>
            Provinsi : <?php echo ucwords($province_id); ?> 
            <br />
            <p class="text-muted">Lintang : <?php echo $lintang; ?>&nbsp&nbsp Bujur :<?php echo $bujur; ?></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8495.929619189115!2d116.3542583!3d0.981768!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f0c0da5d257%3A0xd6a9bd62b01d73c9!2sEducation+Department+Government+of+East+Kalimantan!5e1!3m2!1sen!2sid!4v1522642390639" width="330" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <!-- End Location -->


      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2><strong><i class="fa fa-book margin-r-5"></i>  Detail</strong></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Lingkungan</a></li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">PTK Aktif</a></li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sarpras</a></li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Peserta Disik</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="<?php echo base_url() ?>assets/images/photo1.png" alt="First slide">

                      <div class="carousel-caption">
                        First Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="<?php echo base_url() ?>assets/images/photo2.png" alt="Second slide">

                      <div class="carousel-caption">
                        Second Slide
                      </div>
                    </div>
                    <div class="item">
                      <img src="<?php echo base_url() ?>assets/images/photo3.jpg" alt="Third slide">

                      <div class="carousel-caption">
                        Third Slide
                      </div>
                    </div>
                  </div>

                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                  </a>
                </div>
                <br />
                <div class="row">

                      <p>Media gallery design emelents</p>

                     
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Your Text</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Your Text</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url() ?>assets/images/media.jpg" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
               <!-- start recent activity -->
               <ul class="messages">
                <li>
                  <img src="<?php echo base_url();?>assets/images/img.jpg" class="avatar" alt="Avatar">
                  <div class="message_date">
                    <h3 class="date text-info">24</h3>
                    <p class="month">May</p>
                  </div>
                  <div class="message_wrapper">
                    <h4 class="heading">Desmond Davison</h4>
                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                    <br />
                    <p class="url">
                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                    </p>
                  </div>
                </li>
                <li>
                  <img src="<?php echo base_url();?>assets/images/img.jpg" class="avatar" alt="Avatar">
                  <div class="message_date">
                    <h3 class="date text-error">21</h3>
                    <p class="month">May</p>
                  </div>
                  <div class="message_wrapper">
                    <h4 class="heading">Brian Michaels</h4>
                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                    <br />
                    <p class="url">
                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                      <a href="#" data-original-title="">Download</a>
                    </p>
                  </div>
                </li>
                <li>
                  <img src="<?php echo base_url();?>assets/images/img.jpg" class="avatar" alt="Avatar">
                  <div class="message_date">
                    <h3 class="date text-info">24</h3>
                    <p class="month">May</p>
                  </div>
                  <div class="message_wrapper">
                    <h4 class="heading">Desmond Davison</h4>
                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                    <br />
                    <p class="url">
                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                    </p>
                  </div>
                </li>
                <li>
                  <img src="<?php echo base_url();?>assets/images/img.jpg" class="avatar" alt="Avatar">
                  <div class="message_date">
                    <h3 class="date text-error">21</h3>
                    <p class="month">May</p>
                  </div>
                  <div class="message_wrapper">
                    <h4 class="heading">Brian Michaels</h4>
                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                    <br />
                    <p class="url">
                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                      <a href="#" data-original-title="">Download</a>
                    </p>
                  </div>
                </li>

              </ul>
              <!-- end recent activity -->


            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
              <!-- start user projects -->
              <table class="data table table-striped no-margin">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Company</th>
                    <th class="hidden-phone">Hours Spent</th>
                    <th>Contribution</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>New Company Takeover Review</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">18</td>
                    <td class="vertical-align-mid">
                      <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>New Partner Contracts Consultanci</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">13</td>
                    <td class="vertical-align-mid">
                      <div class="progress">
                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Partners and Inverstors report</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">30</td>
                    <td class="vertical-align-mid">
                      <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>New Company Takeover Review</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">28</td>
                    <td class="vertical-align-mid">
                      <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- end user projects -->

            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
              <p>Peserta Didik </p>
            </div>
          </div>
        </div>
        <br />
      </div>
    </div>
    <!-- end of skills -->
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
