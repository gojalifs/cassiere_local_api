<?php
    require_once 'connection.php';

    $query = "SELECT * FROM 
    ((user INNER JOIN potongan ON user.id = potongan.id) 
            INNER JOIN tunjangan ON user.id = tunjangan.id)
            WHERE user.id = $_GET[id] 
            AND MONTH(tunjangan.bulan) = $_GET[month] AND MONTH(potongan.bulan) = $_GET[month] 
            AND YEAR(tunjangan.bulan) = $_GET[year] AND YEAR(potongan.bulan) = $_GET[year]";

    $result = mysqli_query($con, $query) or die (mysqli_error($con));

    $salary = array();

    while ($data = $result -> fetch_assoc()) {
        array_push(
            $salary, array(
                'id' => $data['id'], 'nama' => $data['nama'],
                'avatar' => $data['avatar'], 'status' => $data['status_kerja'],
                'dept' => $data['departemen'], 'sub_group' => $data['sub_grup'],
                'period' => $data['bulan'], 'gp' => $data['gp'],
                'jabatan' => $data['jabatan'], 'keluarga' => $data['keluarga'],
                'disiplin' => $data['disiplin'], 'transport' => $data['transport'],
                'shift' => $data['shift'], 't_makan' => $data['t_makan'],
                'lembur' => $data['lembur'], 'lain' => $data['t_lain'],
                'asuransi' => $data['asuransi'], 'jht' => $data['bpjs_jht'],
                'jp' => $data['bpjs_jp'], 'medic' => $data['bpjs_kesehatan'],
                'spsi' => $data['spsi'], 'p_makan' => $data['p_makan'],
                'p_lain' => $data['lain'],
            )
        );
    }

    echo json_encode($salary);


?>