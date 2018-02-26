<?php


class MagentoHackathon_FastSimpleExport_Model_Export_Adapter_Array extends MagentoHackathon_FastSimpleExport_Model_Export_Adapter_Abstract
{
    protected  $_content = array();
    public function writeRow(array $rowData)
    {
        $this->_content[] = $rowData;
    }

    public function getContents()
    {
        return $this->_content;
    }

    /**
     * Compatibility method. Ensure compatibility with core class.
     * 
     * @param array $headerCols
     * 
     * @return null
     */
    public function setHeaderCols(array $headerCols)
    {
        return null;
    }

    /**
     * If a tmp file was created on export, remove it.
     *
     * @return void
     */
    public function destruct()
    {
        if (!empty($this->_destination) && file_exists($this->_destination)) {
            unlink($this->_destination);
        }
    }
}
