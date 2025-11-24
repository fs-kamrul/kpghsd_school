<?php

class Grade {

    public function getNumberGrade($num) {
        if ($num >= 80 && $num <= 100) {
            return "A+";
        } else if ($num >= 70 && $num < 80) {
            return "A";
        } else if ($num >= 60 && $num < 70) {
            return "A-";
        } else if ($num >= 50 && $num < 60) {
            return "B";
        } else if ($num >= 40 && $num < 50) {
            return "C";
        } else if ($num >= 33 && $num < 40) {
            return "D";
        } else {
            return "F";
        }
    }

    public function getNumberPoint($num) {
        if ($num >= 80 && $num <= 100) {
            return 5;
        } else if ($num >= 70 && $num < 80) {
            return 4;
        } else if ($num >= 60 && $num < 70) {
            return 3.5;
        } else if ($num >= 50 && $num < 60) {
            return 3;
        } else if ($num >= 40 && $num < 50) {
            return 2;
        } else if ($num >= 33 && $num < 40) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cut_plus($plush) {
        $plus = strlen($plush);
        $plusa = substr($plush, 0, $plus - 3);
        return $plusa;
    }
    public function cut_plus_1($plush) {
        $plus = strlen($plush);
        $plusa = substr($plush, 0, $plus - 1);
        return $plusa;
    }

    public function num_point($plush) {
        $plusa = substr($plush, 0, 4);
        return $plusa;
    }

    public function num_j($plush) {
        $plusa = substr($plush, 0, 1);
        return $plusa;
    }

    public function getLetterGrade($gpa) {
        if ($gpa == 5) {
            return "A+";
        } else if ($gpa >= 4 && $gpa < 5) {
            return "A";
        } else if ($gpa >= 3.5 && $gpa < 4) {
            return "A-";
        } else if ($gpa >= 3 && $gpa < 3.5) {
            return "B";
        } else if ($gpa >= 2 && $gpa < 3) {
            return "C";
        } else if ($gpa >= 1 && $gpa < 2) {
            return "D";
        } else {
            return "F";
        }
    }

    public function getGradePoint($str = "") {
        if (strcmp($str, "A+") == 0) {
            return 5;
        } else if (strcmp($str, "A") == 0) {
            return 4;
        } else if (strcmp($str, "A-") == 0) {
            return 3.5;
        } else if (strcmp($str, "B") == 0) {
            return 3;
        } else if (strcmp($str, "C") == 0) {
            return 2;
        } else if (strcmp($str, "D") == 0) {
            return 1;
        } else if (strcmp($str, "F") == 0) {
            return 0;
        } else {
            return 0;
        }
    }

    public function getgpaav($gp, $i, $f) {
        if ($f == 1) {
            $gp = 0;
        } else {
            if ($i == 0) {
                $gp=0;
            } else {
                $gp = $gp / $i;
                if ($gp > 5) {
                    $gp = 5;
                }
            }
        }
        return $gp;
    }

}
