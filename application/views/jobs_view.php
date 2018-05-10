<?php

  
$data_name = array(
    'name' => 'name',
    'id' => 'name',
    //'required'=>'required',
    'placeholder' => 'Please Enter Name',
    'value'=>set_value('name', '',TRUE)
);

$data_email = array(
    'name' => 'email',
    'id' => 'email',
    //'type'=>'email',
    //'required'=>'required',
    'placeholder' => 'Please Enter Email Id',
    'value'=>set_value('email', '',TRUE)
);

$data_experince = array(
    'name' => 'experience',
    'id' => 'experience',
    'rows' => '4',
    'cols' => '22',
    //'required'=>'required',
    'placeholder' => 'Please Enter Experience',
    'value'=>set_value('experience', '',TRUE)
);
                          

?>
        <div class="right">
            <header id="header">
                <h1>JavaJam Coffee House</h1>
            </header>
            <div id="jobsBorder"></div>
            <div id="rightContent">
                <article>
                    <h2>Jobs at JavaJam</h2>
                    <p>Want to work at JavaJam?Fill out the form below to start your applicaition. Required fields are marked with an astrisk (*)</p>
                    <span id="errorMessageSpan" class="errorMessage" > All the fields are mandatory to apply for the job!!</span>

                     <?php
                       if(isset($isInsert)){
                          echo"<span id ='successMessage' class='successMessage'> Job Application submitted Successfully!</span>";
                          }
                           echo form_open('jobs/jobs_submitted');
                           echo "<table id='jobsForm'>";
                           echo "<tr>";
                           echo "<td>";
                           echo form_label('*Name :', 'name','class=labelBold');
                           echo "</td>";
                           echo "<td>";
                           echo form_input($data_name);
                           echo form_error('name');                           
                           echo "</td>";
                           echo "</tr>";
                           echo "<tr>";
                           echo "<td>";
                           echo form_label('*Email :', 'email','class=labelBold');
                           echo "</th>";
                           echo "<td>";
                           echo form_input($data_email);
                           echo form_error('email');
                           echo "<span id='emailErrorSpan' class='errorMessage'></span>";
                           echo "</td>";
                           echo "</tr>";
                           echo "<tr>";
                           echo "<td>";
                           echo form_label('*Experience:', 'experience','class=labelBold');
                           echo "</td>";
                           echo "<td>";
                           echo form_textarea($data_experince);
                           echo form_error('experience');
                           echo "</td>";
                           echo "</tr>";
                           echo "</table>";
                           echo form_submit('submit', 'Apply Now');
                           echo form_close();
                  ?>
                </article>                
            </div>
        </div>
    </div>