<?php
$pakaian=$_POST["pakaian"];
$kekotoran=$_POST["kekotoran"];

//fuzzifikasi: menghitung derajat keanggotaan banyak pakaian
if ($pakaian<=40){
    $x11=1;}
    elseif ($pakaian>=80){
        $x11=0;}
    else {
        $x11=(80-$pakaian)/(80-40);
    }
if ($pakaian<=40){
    $x12=0;}
    elseif ($pakaian>=80){
        $x12=1;}
    else {
        $x12=($pakaian-40)/(80-40);
    }

//fuzzifikasi: menghitung derajat keanggotaan tingkat kekotoran
if ($kekotoran<40){
    $x21=1;}
    elseif ($kekotoran>=50){
        $x21=0;}
    else {
        $x21=(50-$kekotoran)/(50-40);
    }
if ($kekotoran<40 or $kekotoran>60){
    $x22=0;}
    elseif ($kekotoran>50 and $kekotoran<=60){
        $x22=(60-$kekotoran)/(60-50);}
    else {
      $x22=($kekotoran-40)/(50-40);
    }
if ($kekotoran<=50){
        $x23=0;}
    elseif ($kekotoran>60){
        $x23=1;}
    else { 
        $x23=($kekotoran-50)/(60-50);
    }


//Inferensi
$ar1=min($x11,$x21);
$ar2=min($x11,$x22);
$ar3=min($x11,$x23);
$ar4=min($x12,$x21);
$ar5=min($x12,$x22);
$ar6=min($x12,$x23);

if($ar1==0) {
    $zr1=1200;
} elseif ($ar1==1){
    $zr1=500;
} else {
    $zr1=1200-($ar1*(1200-500));
}

if($ar2==0) {
    $zr2=1200;
} elseif ($ar2==1){
    $zr2=500;
} else {
    $zr2=1200-($ar2*(1200-500));
}

if($ar3==1) {
    $zr3=1200;
} elseif ($ar3==0){
    $zr3=500;
} else {
    $zr3=500+($ar3*(1200-500));
}

if($ar4==0) {
    $zr4=1200;
} elseif ($ar4==1){
    $zr4=500;
} else {
    $zr4=1200-($ar4*(1200-500));
}

if($ar5==1) {
    $zr5=1200;
} elseif ($ar5==0){
    $zr5=500;
} else {
    $zr5=500+($ar5*(1200-500));
}

if($ar6==1) {
    $zr6=1200;
} elseif ($ar6==0){
    $zr6=500;
} else {
    $zr6=500+($ar6*(1200-500));
}

//Defuzzifikasi
$zakhir=(($ar1*$zr1)+($ar2*$zr2)+($ar3*$zr3)+($ar4*$zr4)+($ar5*$zr5)+($ar6*$zr6))/($ar1+$ar2+$ar3+$ar4+$ar5+$ar6);


echo "nilai fuzzifikasi banyak pakaian (sedikit) = ";
echo $x11;
echo "<br>";
echo "nilai fuzzifikasi banyak pakaian (banyak) = ";
echo $x12;
echo "<br><br>";
echo "nilai fuzzifikasi tingkat kekotoran (rendah) = ";
echo $x21;
echo "<br>";
echo "nilai fuzzifikasi tingkat kekotoran (sedang) = ";
echo $x22;
echo "<br>";
echo "nilai fuzzifikasi tingkat kekotoran (tinggi) = ";
echo $x23;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 1 = ";
echo $ar1;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z1 = ";
echo $zr1;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 2 = ";
echo $ar2;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z2 = ";
echo $zr2;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 3 = ";
echo $ar3;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z3 = ";
echo $zr3;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 4 = ";
echo $ar4;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z4 = ";
echo $zr4;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 5 = ";
echo $ar5;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z5 = ";
echo $zr5;
echo "<br><br>";
echo "nilai Inferensi alfa predikat 6 = ";
echo $ar6;
echo "<br>";
echo "nilai Kecepatan Putaran mesin z6 = ";
echo $zr6;
echo "<br><br>";
echo "============KESIMPULAN :=============";
echo "<br><br>";
echo "Nilai akhir jika banyaknya pakaian = ";
echo $pakaian;
echo ", dan tingkat kekotoran bernilai = ";
echo $kekotoran;
echo ", maka kecepatan putaran mesin cuci adalah ";
echo $zakhir;
echo "<br>";
echo "Maka dibulatkan menjadi ";
echo round($zakhir);
echo "<br>";
if($zakhir>=700){
    $kategori="Putaran Cepat";
} else{
    $kategori="Putaran Lambat";
}
echo "Sehingga dapat dikategorikan dengan jenis ";
echo $kategori;

echo "<br><br><br>";
echo "======================================";
echo "<br>";
echo "Terimakasih atas perhatiannya";
echo "<br>";
echo "dibuat oleh Eriska Febrianto";
echo "<br>";
echo "======================================";

?>
