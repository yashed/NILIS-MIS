<?php
$role = "director";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <title>Degree Profile</title>
</head>

<body>
    <div class="degreeprofile-dr-large-box">
        <div class="degreeprofile-large-box">
            <div class="degreeprofile-box_1">
                <?php if (!empty($degrees)) : ?>
                    <p><?= $degrees[0]->DegreeName ?></p>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </div>
            <div class="degreeprofile-box_2" id="degreeprofile-form2" ><p>Overview</p>
                <?php if ($degrees) : ?>
                    <table class="degreeprofile-Overview_table" colspan="2" style="display: flex; justify-content: center;">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="name" id="degreeprofile-name" class="degreeprofile-name" value="<?= $degrees[0]->DegreeName ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Short Name</b><br>
                                <input type="text" name="type" id="degreeprofile-type" value="<?= $degrees[0]->DegreeShortName ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="degreeprofile-year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="degreeprofile-type" value="<?= $degrees[0]->DegreeType ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                <input type="text" name="year" id="degreeprofile-year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                      
                    </table>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </div>
            <div class="degreeprofile-box_3">
                <div class="degreeprofile-box_3_2" id="degreeprofile-semester_subjects_credits">
                    <?php if ($subjects) : ?>
                        <div id="degreeprofile-semester_container">
                            <?php foreach ($subjects as $semesterNumber => $semesterSubjects) : ?>
                                <table class="degreeprofile-Subject_table">
                                    <p id="degreeprofile-Semester" name="semester" class="degreeprofile-semester<?= $semesterNumber ?>">Semester <?= $semesterNumber ?></p>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Credits</th>
                                    </tr>
                                    <?php foreach ($semesterSubjects as $subject) : ?>
                                        <tr>
                                            <td><input style="width: 300px; margin-right: 20px;" value="<?= $subject->SubjectName ?>" type="text" name="SubjectName" class="degreeprofile-SubjectName" placeholder="Subject" readonly></td>
                                            <td><input style="width: 110px; margin-right: 20px;" value="<?= $subject->SubjectCode ?>" type="text" name="SubjectCode" class="degreeprofile-SubjectCode" placeholder="Subject Code" readonly></td>
                                            <td><input style="width: 60px;" value="<?= $subject->NoCredits ?>" type="number" name="NoCredits" class="degreeprofile-NoCredits" placeholder="Credits" readonly></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p>No data found for the specified degree ID.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="degreeprofile-box_4" id="degreeprofile-form1">
                <p>Define Degree Time Table</p>
                <div class="degreeprofile-box_4_1">
                    <table class="degreeprofile-Time_table" id="degreeprofile-Time_table">
                        <?php $lastEventID = 0; ?>
                        <?php if ($degreeTimeTable) : ?>
                            <tr>
                                <th align="left">Event</th>
                                <th colspan="2">Duration</th><br>
                            </tr>
                            <?php foreach ($degreeTimeTable as $event) : ?>
                                <tr>
                                    <td width="76%"><input type="text" value="<?= $event->EventName ?>" class="degreeprofile-event" readonly></td>
                                    <td width="14%"><select class="degreeprofile-duration" id="degreeprofile-type_<?= $event->EventID ?>">
                                            <option value="" default hidden>Event Type</option>
                                            <option value="Examination" <?= ($event->EventType === 'Examination') ? 'selected' : '' ?> disabled>Examination</option>
                                            <option value="Study Leave" <?= ($event->EventType === 'Study Leave') ? 'selected' : '' ?> disabled>Study Leave</option>
                                            <option value="Vacation" <?= ($event->EventType === 'Vacation') ? 'selected' : '' ?> disabled>Vacation</option>
                                            <option value="Other" <?= ($event->EventType === 'Other') ? 'selected' : '' ?> disabled>Other</option>
                                        </select></td>
                                    <td width="12%"><input type="date" value="<?= $event->StartingDate ?>" class="degreeprofile-duration" readonly></td>
                                    <td width="12%"><input type="date" value="<?= $event->EndingDate ?>" class="degreeprofile-duration"  readonly></td>
                                </tr>
                                <?php if ($event->EventID > $lastEventID) {
                                    $lastEventID = $event->EventID;
                                } ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No data found for the specified degree ID.</p>
                        <?php endif; ?>
                    </table>
                </div>
               
                </div>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    
</body>
</html>