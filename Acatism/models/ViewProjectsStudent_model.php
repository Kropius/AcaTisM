<?php
class ViewProjectsStudent_model extends Model{
    public $projects;
    public $nr_projects;
    function __construct()
    {
        parent::__construct();

    }
    public function getAllProjects()
    {
        $getProject = $this->db->query("select projects.id as 'id',
                                                        projects.name as 'numeproiect',
                                                        projects.id as 'project_id',
                                                        projects.long_description as 'long_description',
                                                        deadlines.mandatory_date as 'mandatory_date',
                                                        deadlines.extension as 'extension',
                                                        deadlines.format as 'format',
                                                        deadlines.description as 'description',
                                                        teachers.name as 'nume_prof',
                                                        teachers.id as 'id_prof'
                                                        from projects left join deadlines on projects.id=deadlines.id_project left join concepts on projects.id=concepts.id_project
                                                 left join teachers on teachers.id=concepts.id_teacher ");
        $get_nr_projects = $this->db->query("select count(*) from projects left join deadlines on projects.id=deadlines.id_project");
        $this->nr_projects=$get_nr_projects->fetch()['count(*)'];
        $this->projects=array();
        while($row=$getProject->fetch()) {
            $this->projects[count($this->projects)] = $row;

        }


    }
}