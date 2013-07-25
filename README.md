# Czech post SIPO generator

Simple class for generating SIPO file for organizations.

       $sipo = new SIPO(123456789, 2013, 6);

       foreach($lines as $row)
        {
            $text = "Service XXX";
            $sipo_line = SIPO_Line::factorty($sipo, $row["SIPO"], $row["celkem"], $text);
            $sipo->addLine($sipo_line);
        }


