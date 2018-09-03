<?php
    #
    # MY_Loader extends CI_Loader in order to include header.php & footer.php into the webpage.
    # to use this template, simply use: "$this->load->template('YOUR_VIEW_NAME_HERE');" instead of "$this->load->view('YOUR_VIEW_NAME_HERE');"
    #
    # Edited by: Aethylwyne, 04/07/2018
    #
    class MY_Loader extends CI_Loader {
        public function template($template_name, $vars = array(), $return = FALSE)
        {
            if($return):
            $content  = $this->view('template/header.php', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('template/footer.php', $vars, $return);

            return $content;
        else:
            $this->view('template/header.php', $vars);
            $this->view($template_name, $vars);
            $this->view('template/footer.php', $vars);
        endif;
        }
    }
?>