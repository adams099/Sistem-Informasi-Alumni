<?php

namespace App\Controllers;

class PdfDownload extends BaseController
{
    public function userPdf()
    {
        $file = FCPATH . 'assets\pdf\BUKU PANDUAN SISINFO_ALUMNI_USERS(ALUMNI&MAHASISWA).pdf';

        return $this->response->download($file, null)->setFileName('User Guide for Alumni and Student.pdf');
        redirect()->to('/register');
    }

    public function adminPdf()
    {
        $file = FCPATH . 'assets\pdf\BUKU PANDUAN SISINFO_ALUMNI_(ADMIN).pdf';

        return $this->response->download($file, null)->setFileName('User Guide for Administrator.pdf');
        redirect()->to('/');
    }
}
