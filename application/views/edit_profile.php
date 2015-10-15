<section class="content-header">
    <h1>
        Edit Profile        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Edit Profile</a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <?php if (isset($update) && $update["status"]) { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
            Proses update profile berhasil.
        </div>
    <?php } else if (isset($update) && !$update["status"]) { ?>    
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> Error!</h4>
            Proses update profile gagal, email telah terdaftar.
        </div>
    <?php } ?>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> User Profile</h3>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="<?php echo $base_url?>index.php/backend/edit_profile">
                    <input type="hidden" name="id" value="<?php echo $user_profile->ID;?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputNama">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" value="<?php echo $user_profile->VNAMA;?>" placeholder="Nama" id="inputNama" class="form-control" required data-validation-required-message="Masukkan Nama Anda" title="Masukkan Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="<?php echo $user_profile->VEMAIL;?>" placeholder="Email" id="inputEmail" class="form-control" required data-validation-required-message="Masukkan Email Anda">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password </label>
                            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password" id="inputPassword" class="form-control" pattern=".{6,}"   title="Panjang Password Minimum 6 Karakter">
                        </div>     
                        <div class="form-group">
                            <label for="inputHP">No HP <span class="text-danger">*</span></label>
                            <input type="text" name="hape" value="<?php echo $user_profile->VHPNUM;?>" placeholder="Nomor HP" id="inputHape" class="form-control" required data-validation-required-message="Masukkan Nomor HP Anda">
                        </div>
                        <div class="form-group">
                            <label for="inputHP">Perusahaan </label>
                            <input type="text" name="perusahaan"  value="<?php echo $user_profile->VPERUSAHAAN;?>" placeholder="Perusahaan" id="inputPerusahaan" class="form-control" >
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Update Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- Your Page Content Here -->

</section>

<div class="example-modal" >
    <div class="modal" id="detail_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">Basic Finance</h4>
                </div>
                <div class="modal-body">
                    <div>                            
                        <div id="modal_class" class="small-box bg-light-blue">
                            <div class="inner">
                                <h3 id="modal_titlesh">Bc</h3>
                                <p id="modal_title2">Basic Finance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>                            
                        </div>   
                    </div>    
                    <div id="modal_desc">
                        Lorem ipsum blaasius repum normandis apsun.
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="form_paket" method="post" action="<?php echo $base_url; ?>index.php/backend/beli_paket">
                        <input type="hidden" name="paket_id" id="paket_id" value="0"/>
                        <input type="hidden" name="freetrial" id="freetrial" value="F"/>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>                    
                        <!--<input type="submit" class="btn btn-primary" value="Beli Paket" />-->
                        <button type="button" class="btn btn-default" onclick="buy_paket(1)">Free Trial</button>  
                        <button type="button" class="btn btn-primary" onclick="buy_paket()">Beli Paket</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->