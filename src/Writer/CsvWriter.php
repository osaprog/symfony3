<?php
namespace Writer;

class CsvWriter extends BaseWriter {

    public function handleData() {
        try {
            $output = fopen('php://temp', 'r+');

            foreach ($this->data as $row) {
                fputcsv($output, $row);
            }
            rewind($output);
            $this->data = '';
            while ($line = fgets($output)) {
                $this->data .= $line;
            }
            $this->data .= fgets($output);

            $this->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $this->fileName));
            if (!$this->headers->has('Content-Type')) {
                $this->headers->set('Content-Type', 'text/csv');
            }
            $this->setContent($this->data);
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

}
