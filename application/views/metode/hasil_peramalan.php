<section class="content-header">
      <h1>
        Hasil Peramalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Hasil Peramalan</li>
      </ol>
    </section>
<!-- /.row -->
<!-- Projects Row -->
<div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="pull-right">
                
            </div>
        </div>
    <div class="box-body table-responsive">
      
      <?php
       echo "Tahun : ".$tahun."<br>";
       echo "Bulan : ".$bulan."<br>";
       echo "Nama Barang : ".$nama_bar."<br>";
      $alpha = 0.1;
      for ($i=1; $i <= 10 ; $i++) { 
        $beta = 0.1;
        for ($j=1; $j <= 10 ; $j++) { 
          $jum_error2 = 0;
          $jum_abs = 0;
          $jum_dt = 0;
          
          $alpha;
          $beta;
       ?>
       
                        <?php 
                        $a = 1;
                        foreach ($tampil_id as $key) {
                         ?>
                        <?php  $a; ?>
                          <?php  $key->tahun; ?>
                          <?php  $key->bulan; ?>
                          
                            <?php  $penjualan[$i][$j][$a] = $key->jumlah; ?>
                             <?php  
                                if ($a == 1) {
                                   $levelt[$i][$j][$a] = $key->jumlah;
                                }else{
                                  
                                   $levelt[$i][$j][$a] = $alpha*$key->jumlah+(1-$alpha)*($levelt[$i][$j][$a-1]+$trendt[$i][$j][$a-1]);
                                }
                             ?>
                             <?php
                                $b = 1;  
                                foreach ($tampil_id as $r) {
                                  $nilai_p[$b] = $r->jumlah;
                                  $b++;
                                }

                                if ($a == 1) {
                                   $trendt[$i][$j][$a] = (($nilai_p[2] - $nilai_p[1]) + ($nilai_p[4] - $nilai_p[3]))/2;
                                }else{
                                   $trendt[$i][$j][$a] = $beta*($levelt[$i][$j][$a]-$levelt[$i][$j][$a-1])+(1-$beta)*$trendt[$i][$j][$a-1];
                                }
                              ?>
                             <?php  
                                if ($a == 1) {
                                   $forecastt[$i][$j][$a] = $key->jumlah;
                                }else{
                                   $forecastt[$i][$j][$a] = $levelt[$i][$j][$a-1] + $trendt[$i][$j][$a-1];
                                }
                             ?>
                             <?php  
                                 $error[$i][$j][$a] = $forecastt[$i][$j][$a] - $penjualan[$i][$j][$a];
                             ?>
                             <?php  
                                 $error2[$i][$j][$a] = $error[$i][$j][$a] * $error[$i][$j][$a];
                                $jum_error2 = $jum_error2 + $error2[$i][$j][$a];
                             ?>
                             <?php  
                                 $abs_error[$i][$j][$a] = abs($error[$i][$j][$a]);
                                $jum_abs = $jum_abs + $abs_error[$i][$j][$a];
                             ?>
                             <?php  
                                 $dt[$i][$j][$a] = $abs_error[$i][$j][$a]/$penjualan[$i][$j][$a];
                                $jum_dt = $jum_dt + $dt[$i][$j][$a];
                             ?>
                        <?php 
                        $a++;
                        } ?>
                <?php


                 $rata_error2[$i][$j] = $jum_error2/($a-1);

                 $rata_abs[$i][$j] = $jum_abs/($a-1);

                 $rata_dt[$i][$j] = $jum_dt/($a-1);

                 $jum_error2;

                 $nilai_alpha[$i][$j] = $alpha;

                 $nilai_beta[$i][$j] = $beta;

                $beta = $beta + 0.1;
                }
                $alpha = $alpha + 0.1;
                }


                ?>
          <br>
          <?php 
          $min = $rata_dt['1']['1'];
          foreach ($rata_dt as $key) {
              foreach ($key as $keys => $value) {
                if ($value < $min) {
                  $min = $value;
                }
            } 
          }
          echo "Min Value : ";
          echo $min;
          echo "<br>";
          echo "MSE : ";
          echo $rata_error2[$i][$j] = $jum_error2/($a-1);
          echo "<br>";
          echo "MAD : ";
          echo $rata_abs[$i][$j] = $jum_abs/($a-1);
          echo "<br>";
          echo "SSE : ";
          echo $jum_error2;
          echo "<br>";

          $num = 1;
          for ($k=1; $k < $i ; $k++) { 
            for ($l=1; $l < $j ; $l++) { 
              if ($rata_dt[$k][$l] == $min) {
                echo "MAPE : ";
                echo $r_dt = $rata_dt[$k][$l];
                echo "<br>";
                echo "Alpha : ";
                echo $n_alpha = $nilai_alpha[$k][$l];
                echo " / Beta : ";
                echo $n_beta = $nilai_beta[$k][$l];
                break;
              }
            }
          }
           ?>
           <br>
           <br>
           <form action="<?=site_url('metode/detail_mape')?>" method="post" enctype="multipart/form-data">
             <input type="hidden" name="nama_bar"  class="form-control" value="<?php echo $nama_bar; ?>">
             <button type="submit" class="btn btn-primary">Detail MAPE</button>
           </form>
           <br>
           <br>
           <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <br>
           <br>
           <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>                
                            <th>Tahun</th>                
                            <th>Bulan</th>                
                            <th>Total Penjualan</th>
                            <th>Level Lt</th>                
                            <th>Trend Tt</th>                
                            <th>Forecast Ft</th>                
                            <th>Error</th>                
                            <th>Error^2</th>                
                            <th>Absolute Error</th>                
                            <th>|Ft-Dt|/Dt</th>                
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $m = 1;
                        foreach ($tampil_id as $row) {
                         ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <td><?php echo $tahun_terakhir = $row->tahun; ?></td>
                          <td><?php echo $bulan_terakhir = $row->bulan; ?></td>
                          <td>
                            <?php echo $penjualan_2[$m] = $row->jumlah; ?>
                              
                          </td>
                          <td>
                             <?php  
                                if ($m == 1) {
                                  echo $levelt_2[$m] = $row->jumlah;
                                }else{
                                  
                                  echo $levelt_2[$m] = $n_alpha*$row->jumlah+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                                }
                             ?>
                           </td>    
                           <td>
                             <?php
                                $n = 1;  
                                foreach ($tampil_id as $re) {
                                  $nilai_p_2[$n] = $re->jumlah;
                                  $n++;
                                }

                                if ($m == 1) {
                                  echo $trendt_2[$m] = (($nilai_p_2[2] - $nilai_p_2[1]) + ($nilai_p_2[4] - $nilai_p_2[3]))/2;
                                }else{
                                  echo $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                                }
                              ?>
                           </td>
                           <td>
                             <?php  
                                if ($m == 1) {
                                  echo $forecastt_2[$m] = $row->jumlah;
                                }else{
                                  echo $forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1];
                                }
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error_2[$m] = $forecastt_2[$m] - $penjualan_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error2_2[$m] = $error_2[$m] * $error_2[$m];
                                $jum_error2_2 = $jum_error2 + $error2_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $abs_error_2[$m] = abs($error_2[$m]);
                                $jum_abs = $jum_abs + $abs_error_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $dt_2[$m] = $abs_error_2[$m]/$penjualan_2[$m];
                                $jum_dt = $jum_dt + $dt_2[$m];
                             ?>
                           </td>
                        </tr>
                        <?php
                        $m++;
                        } ?>
                        <?php 
                        $panjang_tahun = 1;
                        $jumlah_bulan_2 = $bulan_terakhir;
                        if ($tahun == $tahun_terakhir) {
                          $panjang = $bulan - $bulan_terakhir;
                        }else if ($tahun > $tahun_terakhir){
                          if (($tahun - $tahun_terakhir) == 1) {
                            $panjang = $bulan + (12 - $bulan_terakhir);
                          }else{
                            $panjang = (($tahun - $tahun_terakhir)*12) + $bulan + (12 - $bulan_terakhir);
                          }
                        }else{
                          $panjang = 0;
                        }
                        $jumlah_bulan = 12 - (12 - $bulan_terakhir);
                        $jumlah_tahun = 0;
                        for ($i=0; $i < $panjang ; $i++) { ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <td><?php
                            echo $tahun_terakhir + $jumlah_tahun;
                            $jumlah_bulan++;
                            if ($jumlah_bulan >= 12) {
                              $jumlah_bulan = 0;
                              $jumlah_tahun++;
                            }
                            ?>
                          </td>
                          <td>
                            <?php 

                            if ($jumlah_bulan_2 >= 12) {
                              $jumlah_bulan_2 = 0;
                            }
                            echo $bulan_terakhir + $jumlah_bulan_2;
                            $jumlah_bulan_2++;

                            ?>
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            <?php 
                            // echo $levelt_2[$m] = $n_alpha*$forecastt_2[$m-1]+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                            echo $levelt_2[$m] = $n_alpha*($levelt_2[$m-1] + $trendt_2[$m-1])+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                            ?>
                          </td>
                          <td>
                            <?php 
                            echo $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                            ?>
                          </td>
                          <td>
                            <?php 
                            echo $forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1];
                            ?>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <?php 
                        $m++;
                        } ?>
                    </tbody>
                </table>
    </div>
</div>

<script>
  $(function () {
    "use strict";

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2016-01', item1: 0.800000011920929, item2: 0.800000011920929},
        {y: '2016-02', item1: 0.4000000059604645, item2: 0.80000001192093},
        {y: '2016-03', item1: 0.800000011920929, item2: 0.75600001126528},
        {y: '2016-04', item1: 1.2000000178813934, item2: 0.75684001127779},
        {y: '2016-05', item1: 0.4000000059604645, item2: 0.80202761195114},
        {y: '2016-06', item1: 0.800000011920929, item2: 0.75867617530516},
        {y: '2016-07', item1: 0.800000011920929, item2: 0.76007312128597},
        {y: '2016-08', item1: 0.800000011920929, item2: 0.76172964157506},
        {y: '2016-09', item1: 0.800000011920929, item2: 0.76360321353869},
        {y: '2016-10', item1: 0.800000011920929, item2: 0.76360321353869},
        {y: '2016-11', item1: 0.800000011920929, item2: 0.76784202692208},
        {y: '2016-12', item1: 0.800000011920929, item2: 0.77013337434113},
        {y: '2017-01', item1: 0.4000000059604645, item2: 0.77249425339408},
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Data Aktual', 'Data Peramalan'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
  });
</script>