<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class User extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Mcrud');
	}

    public function index()
    {
		// Mengambil data evaluasi dari tabel 'evaluasi'
        $evaluasi = $this->Mcrud->get_data('split')->result();

        // Menghitung jumlah data evaluasi dengan masing-masing label
        $jumlah_negatif = 0;
        $jumlah_netral = 0;
        $jumlah_positif = 0;
        foreach ($evaluasi as $item) {
            if ($item->sentimen == 'Negatif') {
                $jumlah_negatif++;
            } elseif ($item->sentimen == 'Netral') {
                $jumlah_netral++;
            } elseif ($item->sentimen == 'Positif') {
                $jumlah_positif++;
            }
        }
        
        // Menyimpan jumlah data evaluasi dengan masing-masing label ke dalam array
        $data['jumlah_evaluasi'] = [
            'Negatif' => $jumlah_negatif,
            'Netral' => $jumlah_netral,
            'Positif' => $jumlah_positif
        ];
        $this->load->view('user/header');
        $this->load->view('user/user', $data);
        $this->load->view('user/footer');
    }

    public function casefolding()
    {
        $data['cleaning'] = $this->db->query('SELECT * FROM dataset a, cleaning b where a.id_dataset=b.id_dataset');	
        $this->load->view('user/header');
        $this->load->view('user/casefolding', $data);
        $this->load->view('user/footer');
    }

    public function download_casefolding()
    {
        // Ambil data dari database
        $data = $this->db->query('SELECT b.id_cleaning, a.id_dataset, a.text, b.text_cleaning FROM dataset a JOIN cleaning b ON a.id_dataset = b.id_dataset')->result_array();
    
        if (!empty($data)) {
            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
    
            // Set header columns
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Data Asli');
            $sheet->setCellValue('C1', 'Casefolding');
    
            // Set data rows
            $no = 1;
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item['text']);
                $sheet->setCellValue('C' . $row, $item['text_cleaning']);
                $row++;
            }
    
            // Set autofilter
            $lastColumn = $sheet->getHighestColumn();
            $sheet->setAutoFilter('A1:' . $lastColumn . '1');
    
            // Save the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $filename = 'casefolding_data.xlsx';
            $writer->save($filename);
    
            // Generate response for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
    
            readfile($filename);
            exit;
        } else {

        }
        // Jika data kosong, tampilkan pesan
        $this->session->set_flashdata('suces', '<div class="col-md-12"><div class="alert alert-danger alert-message" align="center">Tidak ada data yang tersedia.</div></div>');

        // Redirect kembali ke halaman casefolding
        redirect('user/casefolding');
    }
    
    public function vocab() {
		$result = $this->db->query("SELECT * FROM vocab")->result();
		$vocab = !empty($result) ? json_decode($result[0]->vocab) : array();
		$wordFrequencies = $this->calculateWordFrequencies($vocab);
	
		// Menyiapkan data untuk dikirim ke view
		$data['vocab'] = $vocab;
		$data['wordFrequencies'] = $wordFrequencies;
	
		// Mengurutkan frekuensi kata dari yang terbanyak
		arsort($data['wordFrequencies']);
	
        $this->load->view('user/header');
        $this->load->view('user/vocab', $data);
        $this->load->view('user/footer');
	}
	
	private function calculateWordFrequencies($vocab) {
		// Mengambil data teks dari database
		$result = $this->db->query("SELECT * FROM stemming")->result();
		$text = '';
		foreach ($result as $row) {
			$text .= $row->text_stemming . ' ';
		}
	
		// Memecah teks menjadi kata-kata
		$words = explode(' ', strtolower($text));
	
		// Menginisialisasi array frekuensi kata
		$wordFrequencies = array();
	
		// Menghitung frekuensi kata berdasarkan kamus
		foreach ($vocab as $word) {
			$frequency = 0;
			foreach ($words as $w) {
				if ($w === $word) {
					$frequency++;
				}
			}
			$wordFrequencies[$word] = $frequency;
		}
	
		return $wordFrequencies;
	}	

    public function download_vocab()
    {
        $result = $this->db->query("SELECT * FROM vocab")->result();
        $vocab = !empty($result) ? json_decode($result[0]->vocab) : array();
        $wordFrequencies = $this->calculateWordFrequencies($vocab);

        // Mengurutkan frekuensi kata dari yang terbanyak
        arsort($wordFrequencies);

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $sheet->setCellValue('A1', 'Word');
        $sheet->setCellValue('B1', 'Frequency');

        // Set vocab data
        $row = 2;
        foreach ($vocab as $word) {
            $sheet->setCellValue('A' . $row, $word);
            $sheet->setCellValue('B' . $row, $wordFrequencies[$word]);
            $row++;
        }

        // Save the spreadsheet to a file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'vocab_data.xlsx';
        $writer->save($filename);

        // Generate response for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        readfile($filename);
        exit;
    }

    public function stopword()
    {
		$data['stopwords'] = $this->db->query('SELECT * FROM cleaning a, stopwords b where a.id_cleaning=b.id_cleaning');
        $this->load->view('user/header');
        $this->load->view('user/stopword', $data);
        $this->load->view('user/footer');
    }

    public function download_stopword()
    {
        // Fetch data from the database
        $data = $this->db->query('SELECT b.id_cleaning, a.id_stopwords, a.text_stopwords, b.text_cleaning FROM stopwords a JOIN cleaning b ON a.id_cleaning = b.id_cleaning')->result_array();

        if (!empty($data)) {
            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set header columns
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Text Clean');
            $sheet->setCellValue('C1', 'Stopwords');

            // Set data rows
            $no = 1;
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item['text_cleaning']);
                $sheet->setCellValue('C' . $row, $item['text_stopwords']);
                $row++;
            }

            // Set autofilter
            $lastColumn = $sheet->getHighestColumn();
            $sheet->setAutoFilter('A1:' . $lastColumn . '1');

            // Save the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $filename = 'stopwords_data.xlsx';
            $writer->save($filename);

            // Generate response for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            readfile($filename);
            exit;
        } else {

        }
        // If data is empty, show a message
        $this->session->set_flashdata('suces', '<div class="col-md-12"><div class="alert alert-danger alert-message" align="center">Tidak ada data yang tersedia.</div></div>');

        // Redirect back to the stopword page
        redirect('user/stopword');
    }


    public function stemming()
    {
		$data['stemming'] = $this->db->query('SELECT * FROM stopwords a, stemming b where a.id_stopwords=b.id_stopwords');  
        $this->load->view('user/header');
        $this->load->view('user/stemming', $data);
        $this->load->view('user/footer');
    }

    public function download_stemming()
    {
        // Fetch data from the database
        $data = $this->db->query('SELECT b.id_stopwords, a.id_stemming, a.text_stemming, b.text_stopwords FROM stemming a JOIN stopwords b ON a.id_stopwords = b.id_stopwords')->result_array();

        if (!empty($data)) {
            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set header columns
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Stopwords');
            $sheet->setCellValue('C1', 'Stemming');

            // Set data rows
            $no = 1;
            $row = 2;
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item['text_stopwords']);
                $sheet->setCellValue('C' . $row, $item['text_stemming']);
                $row++;
            }

            // Set autofilter
            $lastColumn = $sheet->getHighestColumn();
            $sheet->setAutoFilter('A1:' . $lastColumn . '1');

            // Save the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $filename = 'stemming_data.xlsx';
            $writer->save($filename);

            // Generate response for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            readfile($filename);
            exit;
        } else {
        }
        // If data is empty, show a message
        $this->session->set_flashdata('suces', '<div class="col-md-12"><div class="alert alert-danger alert-message" align="center">Tidak ada data yang tersedia.</div></div>');

        // Redirect back to the stemming page
        redirect('user/stemming');
    }


    public function hasil()
    {
        // Ambil data report dari database
        $report = $this->db->get_where('report', ['id_report' => 1])->row();

        // Jika data report ditemukan, ambil nilai accuracy dan confusion_matrix
        if ($report) {
            $accuracy = $report->accuracy;
            $confusionMatrix = json_decode($report->confusion_matrix, true);
            $f1_score = $report->f1_score;
            $precision = $report->precision;
            $recall = $report->recall;
        } else {
            $accuracy = null;
            $confusionMatrix = [
                'Negatif' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ],
                'Netral' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ],
                'Positif' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ]
            ];
            $f1_score = null;
            $precision = null;
            $recall = null;
        }
    
        $data['accuracy'] = $accuracy;
        $data['confusionMatrix'] = $confusionMatrix;
        $data['f1_score'] = $f1_score;
        $data['precision'] = $precision;
        $data['recall'] = $recall;

        $this->load->view('user/header');
        $this->load->view('user/hasil', $data);
        $this->load->view('user/footer');
    }

    public function download_hasil()
    {
        // Ambil data report dari database
        $report = $this->db->get_where('report', ['id_report' => 1])->row();

        // Jika data report ditemukan, ambil nilai accuracy dan confusion_matrix
        if ($report) {
            $accuracy = $report->accuracy;
            $confusionMatrix = json_decode($report->confusion_matrix, true);
            $f1_score = $report->f1_score;
            $precision = $report->precision;
            $recall = $report->recall;
        } else {
            $accuracy = null;
            $confusionMatrix = [
                'Negatif' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ],
                'Netral' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ],
                'Positif' => [
                    'Negatif' => 0,
                    'Netral' => 0,
                    'Positif' => 0
                ]
            ];
            $f1_score = null;
            $precision = null;
            $recall = null;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set accuracy value
        $sheet->setCellValue('A1', 'Accuracy:');
        $sheet->setCellValue('B1', $accuracy);
        
        $sheet->setCellValue('A2', 'F1 Score:');
        $sheet->setCellValue('B2', $f1_score);

        $sheet->setCellValue('A3', 'Precision:');
        $sheet->setCellValue('B3', $precision);

        $sheet->setCellValue('A4', 'Recall:');
        $sheet->setCellValue('B4', $recall);

        // Set confusion matrix
        $sheet->setCellValue('A6', 'Confusion Matrix:');
        $row = 4;
        foreach ($confusionMatrix as $rowValues) {
            $column = 'A';
            foreach ($rowValues as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Save the spreadsheet to a file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'hasil_data.xlsx';
        $writer->save($filename);

        // Generate response for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        readfile($filename);
        exit;
    }


}
