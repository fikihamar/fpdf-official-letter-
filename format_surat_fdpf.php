<?php
include 'fpdf/fpdf.php';

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  '           ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
function hari_ini($hari)
{

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return  $hari_ini;
}

class pdf extends FPDF
{
    function letak($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 36, 14, 22, 27);
        //menggeser posisi sekarang
    }
    function judul($teks1, $teks2, $teks3, $teks4, $teks5, $teks6, $teks7, $teks8)
    {
        $this->Cell(35);
        $this->SetFont('Times', '', '14');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', 'B', '20');
        $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '11');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks5, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks6, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '9');
        $this->Cell(0, 4, $teks7, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '12');
        $this->Cell(0, 7, $teks8, 0, 1, 'C');
        $this->Cell(17);
    }
    function isi($isi2, $isi3, $isi4, $isi5)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(4);
        $this->Cell(27);
        $this->Cell(5, 5, $isi2, 0, 0, 'L');
        $this->Cell(65, 5, $isi3, 0, 0, 'L');
        $this->Cell(5, 5, $isi4, 0, 0, 'L');
        $this->Cell(60, 5, $isi5, 0, 0, 'L');
        $this->Ln(2);
    }
    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 55, 208, 55);
        $this->SetLineWidth(0);
        $this->Line(10, 56, 208, 56);
    }
    function tanggalatas($tgl)
    {
        $this->setFont('Times', '', '11');
        $this->Ln(3);
        $this->Cell(95);
        $this->Cell(0, 10, $tgl, 0, 10, 'C');
    }
    function atas($atas1, $atas2, $atas3, $atas4)
    {
        $this->setFont('Times', '', '12');
        $this->Ln(3);
        $this->Cell(15);
        $this->Cell(20, 5, $atas1, 0, 0, 'L');
        $this->Cell(5, 5, $atas2, 0, 0, 'L');
        $this->Cell(89, 5, $atas3, 0, 0, 'L');
        $this->Cell(50, 5, $atas4, 0, 0, 'L');
    }
    function tengah($tengah1, $tengah2, $tengah3, $tengah4)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(4);
        $this->Cell(37);
        $this->Cell(5, 5, $tengah1, 0, 0, 'L');
        $this->Cell(55, 5, $tengah2, 0, 0, 'L');
        $this->Cell(5, 5, $tengah3, 0, 0, 'L');
        $this->Cell(60, 5, $tengah4, 0, 0, 'L');
        $this->Ln(2);
    }
    function bawah($bawah1, $bawah2)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(1);
        $this->Cell(30);
        $this->Cell(8, 5, $bawah1, 0, 0, 'L');
        $this->MultiCell(0, 5, $bawah2);
    }
    function kadis($kadis1, $kadis2, $kadis3, $kadis4)
    {
        $this->SetFont('Times', '', '12');
        $this->Ln(4);
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis1, 0, 0, 'C');
        $this->Ln(25);
        $this->SetFont('Times', 'BU', '12');
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis2, 0, 1, 'C');
        $this->Cell(130, 10);
        $this->SetFont('Times', '', '12');
        $this->Cell(0, 5, $kadis3, 0, 1, 'C');
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis4, 0, 1, 'C');
        $this->Ln(2);
    }
    function tembusan($tembusan1, $tembusan2)
    {
        $this->Cell(13);
        $this->SetFont('Times', '', '11');
        $this->Cell(5, 5, $tembusan1, 0, 0, 'L');
        $this->SetFont('Times', '', '11');
        $this->Cell(5, 5, $tembusan2, 0, 1, 'L');
    }
}
//instantisasi objek
$pdf = new pdf();

//Mulai dokumen
$pdf->AddPage('P', 'Legal');
//meletakkan gambar
$pdf->letak('logo_pemerintah.png');
//meletakkan judul disamping logo diatas
$pdf->judul(
    'PEMERINTAH KABUPATEN BOGOR',
    'DINAS PEMADAM KEBAKARAN',
    'Jl. Tegar beriman - Cibinong Telp. (021)87929445, Fax (021)83719100',
    'Sektor Cibinong (021) 8753547 Sektor Ciawi (0251) 8291505 ',
    'Sektor Leuwiliang (0251) 8642333, Sektor Parung (0251) 8412487, Sektor Ciomas ',
    '(0251) 7587113, Sektor Cileungsi (021) 80470113',
    'E-mail : dpk.kabbogor@gmail.com, Website : damkar.bogorkab.go.id',
    'CIBINONG- 16914'
);

//membuat garis ganda tebal dan tipis
$pdf->garis();
$pdf->tanggalatas('Cibinong,     '  . tgl_indo(date('Y-m'))) . '';
$pdf->atas('Nomor', ':', '', 'Kepada Yth,');
$pdf->Ln(1);
$pdf->atas('Sifat', ':', 'Penting', 'Kepala Badan Pengelolaan');
$pdf->Ln(1);
$pdf->atas('Lampiran', ':', '-', 'Keuangan Dan Aset Daerah');
$pdf->Ln(1);
$pdf->atas('Perihal', ':', 'Pemberitahuan Kenaikan Gaji Berkala', 'Kabupaten Bogor');
$pdf->Ln(1);
$pdf->atas('', '', '', 'Di');
$pdf->Ln(1);
$pdf->atas('', '', '', '        Cibinong');
$pdf->Ln(8);
$pdf->Cell(20);
$pdf->Cell(0, 5, 'Diberitahukan bahwa berhubung telah di penuhinya masa kerja dan syarat-syarat lainnya kepada :', 0, 1, 'L');
$pdf->isi(
    '1.',
    'Nama',
    ':',
    'DIMAS RAYUSAL'
);

$pdf->isi(
    '2.',
    'NIP',
    ':',
    '198107142010011001'
);
$pdf->isi(
    '3.',
    'Pangkat/Golongan',
    ':',
    'Pengatur Muda Tingkat I/II.b'
);
$pdf->isi(
    '4.',
    'Kantor/Tempat',
    ':',
    'Dinas Pemadam Kebakaran Kabupaten Bogor'
);
$pdf->isi(
    '5.',
    'Gaji Pokok Lama',
    ':',
    'Rp. 2,456,600-(PP.No. 30 Tahun 2015)'
);
$pdf->Ln(3);
$pdf->Cell(32);
$pdf->SetFont('Times', '', '11');
$pdf->Cell(0, 5, '(Atas dasar Kenaikan Gaji Berkala yang ditetapkan)', 0, 0, 'L');
$pdf->Ln(3);
$pdf->tengah('a.', 'Oleh Pejabat', ':', 'Bupati Bogor');
$pdf->tengah('b.', 'Tanggal', ':', '17-10-2017');
$pdf->tengah('c.', 'Nomor', ':', '822.2/449/Org');
$pdf->tengah('d.', 'Tanggal Mulai Berlaku', ':', '01-11-2017');
$pdf->tengah('e.', 'Masa Kerja Golongan', ':', '13 Tahun 00 Bulan');
$pdf->tengah('f.', 'Diberikan Kenaikan Gaji Berkala hingga memperoleh', '', '');
$pdf->isi(
    '6.',
    'Gaji Pokok Baru',
    ':',
    'Rp.2.772.500 -( PP.No. 15 Tahun 2019)'
);
$pdf->isi(
    '7.',
    'Berdasarkan Masa Kerja',
    ':',
    '15 Tahun 00 Bulan'
);
$pdf->isi(
    '8.',
    'Dalam Golongan',
    ':',
    'Pengatur/II.c'
);
$pdf->isi(
    '9.',
    'Mulai Tanggal',
    ':',
    '01-11-2019'
);
$pdf->Ln(5);
$pdf->cell(12);
$pdf->setFont('Times', 'B', '11');
$ket = "KETERANGAN";
$pdf->Cell(0, 5, $ket, 0, 0, 'L');
$pdf->Ln(5);
$pdf->bawah('a.', 'Yang bersangkutan adalah Pegawai Negeri Sipil');
$pdf->bawah('b.', 'Kenaikan Gaji yang akan datang pada Tanggal 01 November  2021, Jika memenuhi syarat yang di perlukan.');
$pdf->bawah('', 'Diharapkan agar sesuai dengan Peraturan Pemerintah Rebuplik Indonesia Nomor 30 tahun 2015 tentang perubahan Keempat belas atas Peraturan Pemerintah Nomor 34 Tahun 1977 tentang Peraturan Gaji Pegawai Negeri Sipil kepada pegawai tersebut dapat dibayarkan penghasilannya berdasarkan gaji pokok yang baru. ');
$pdf->setFont('Times', '', '12');
$nip = "196402061993031010";
$pdf->kadis("Kepala Dinas", "Drs.MA'MUR M. Si", "Pembina Tingkat I", "NIP.  " . $nip . "");
$pdf->Ln(5);
$pdf->cell(13);
$pdf->setFont('Times', 'U', '11');
$pdf->Cell(0, 5, "Tembusan Disampaikan Kepada Yth :", 0, 1, 'L');
$pdf->tembusan('1.', 'Menteri Dalam Negeri di Jakarta');
$pdf->tembusan('2.', 'Gubernur Jawa Barat di Bandung');
$pdf->tembusan('3.', 'Kepala Kantor BKN Regional III di Bandung');
$pdf->tembusan('4.', 'Inspektur Kabupaten Bogor');
$pdf->tembusan('5.', 'Kepala BKPP Kabupaten Bogor');
$pdf->Ln(1);
$pdf->Cell(13);
$pdf->SetFont('Times', '', '11');
$pdf->Cell(5, 5, '6.', 0, 0, 'L');
$pdf->Cell(8, 5, 'Sdr.', 0, 0, 'L');
$pdf->SetFont('Times', 'B', '11');
$pdf->Cell(5, 5, 'DIMAS RAYUSAL', 0, 0, 'L');
$pdf->Output('kgb .pdf', 'I');
