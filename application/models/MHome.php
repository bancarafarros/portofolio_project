<?php 

class MHome extends CI_Model {
    
    private $_hobbies = "hobbies";
    private $_social_medias = "social_medias";
    private $_cv_data = "cv_data";
    private $_skills = "skills";
    private $_educations = "educations";
    private $_languages = "languages";
    private $_experiences = "experiences";

    public function tampilHobbies() {
        return $this->db->get($this->_hobbies);   
    }

    public function tampilSocialMedias() {
        return $this->db->get($this->_social_medias);
    }
    
    public function tampilCVData() {
        return $this->db->get($this->_cv_data);
    }
    
    public function tampilSkills() {
        return $this->db->get($this->_skills);
    }

    public function tampilEducations() {
        return $this->db->get($this->_educations);
    }

    public function tampilLanguages() {
        return $this->db->get($this->_languages);
    }

    public function tampilExperiences() {
        return $this->db->get($this->_experiences);
    }
}

?>