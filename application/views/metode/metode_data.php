<section class="content-header">
      <h1>
        Perhitungan Metode
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Metode</li>
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
       
      $alpha = 0.1;
      for ($i=1; $i <= 10 ; $i++) { 
        $beta = 0.1;
        for ($j=1; $j <= 10 ; $j++) { 
          $jum_error2 = 0;
          $jum_abs = 0;
          $jum_dt = 0;
          echo "<br>";
          echo "<br>";
          echo "Alpha : ".$alpha." Beta : ".$beta;
       ?>
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
                        $a = 1;
                        foreach ($tampil as $key) {
                         ?>
                        <tr>
                          <td><?php echo $a; ?></td>
                          <td><?php echo $key->tahun; ?></td>
                          <td><?php echo $key->bulan; ?></td>
                          <td>
                            <?php echo $penjualan[$i][$j][$a] = $key->jumlah; ?>
                              
                          </td>
                          <td>
                             <?php  
                                if ($a == 1) {
                                  echo $levelt[$i][$j][$a] = $key->jumlah;
                                }else{
                                  
                                  echo $levelt[$i][$j][$a] = $alpha*$key->jumlah+(1-$alpha)*($levelt[$i][$j][$a-1]+$trendt[$i][$j][$a-1]);
                                }
                             ?>
                           </td>    
                           <td>
                             <?php
                                $b = 1;  
                                foreach ($tampil as $r) {
                                  $nilai_p[$b] = $r->jumlah;
                                  $b++;
                                }

                                if ($a == 1) {
                                  echo $trendt[$i][$j][$a] = (($nilai_p[2] - $nilai_p[1]) + ($nilai_p[4] - $nilai_p[3]))/2;
                                }else{
                                  echo $trendt[$i][$j][$a] = $beta*($levelt[$i][$j][$a]-$levelt[$i][$j][$a-1])+(1-$beta)*$trendt[$i][$j][$a-1];
                                }
                              ?>
                           </td>
                           <td>
                             <?php  
                                if ($a == 1) {
                                  echo $forecastt[$i][$j][$a] = $key->jumlah;
                                }else{
                                  echo $forecastt[$i][$j][$a] = $levelt[$i][$j][$a-1] + $trendt[$i][$j][$a-1];
                                }
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error[$i][$j][$a] = $forecastt[$i][$j][$a] - $penjualan[$i][$j][$a];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error2[$i][$j][$a] = $error[$i][$j][$a] * $error[$i][$j][$a];
                                $jum_error2 = $jum_error2 + $error2[$i][$j][$a];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $abs_error[$i][$j][$a] = abs($error[$i][$j][$a]);
                                $jum_abs = $jum_abs + $abs_error[$i][$j][$a];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $dt[$i][$j][$a] = $abs_error[$i][$j][$a]/$penjualan[$i][$j][$a];
                                $jum_dt = $jum_dt + $dt[$i][$j][$a];
                             ?>
                           </td>
                        </tr>
                        <?php 
                        $a++;
                        } ?>
                    </tbody>
                </table>
                <?php

                echo "<br>";
                echo "MSE : ";
                echo $rata_error2[$i][$j] = $jum_error2/($a-1);
                echo "<br>";
                echo "MAD : ";
                echo $rata_abs[$i][$j] = $jum_abs/($a-1);
                echo "<br>";
                echo "MAPE : ";
                echo $rata_dt[$i][$j] = $jum_dt/($a-1);
                echo "<br>";
                echo "SSE : ";
                echo $jum_error2;
                echo "<br>";
                echo "Alpha : ";
                echo $nilai_alpha[$i][$j] = $alpha;
                echo "<br>";
                echo "Beta : ";
                echo $nilai_beta[$i][$j] = $beta;

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

          $num = 1;
          for ($k=1; $k < $i ; $k++) { 
            for ($l=1; $l < $j ; $l++) { 
              if ($rata_dt[$k][$l] == $min) {
                echo "Alpha : ";
                echo $nilai_alpha[$k][$l];
                echo " / Beta : ";
                echo $nilai_beta[$k][$l];
                break;
              }
            }
          }
           ?>
    </div>
</div>

<!-- ============ MODAL ADD =============== -->
