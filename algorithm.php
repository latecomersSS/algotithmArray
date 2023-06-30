<?php
// Hàm nhập số từ bàn phím
function inputNumbers($prompt){
        echo $prompt;
        return trim(fgets(STDIN));
    }

    // Nhập chuỗi số từ bàn phím
    $input = inputNumbers("Nhập 5 số, phân cách bởi khoảng trắng: ");

    // Xóa khoảng trắng thừa
    $input = trim($input);

    // Kiểm tra xem có nhập gì không
    if (empty($input)) {
        echo "Hãy nhập số.\n";
        exit;
    }

    // Kiểm tra xem chuỗi có chứa ký tự không phải là chữ số hay không
    if (!ctype_digit(str_replace(" ", "", $input))) {
        echo "Vui lòng chỉ nhập các số nguyên.\n";
        exit;
    }

    // Tách chuỗi thành mảng các số
    $numberStrings = explode(" ", $input);

    // Kiểm tra xem có đủ 5 số hay không
    if (count($numberStrings) !== 5) {
        echo "Vui lòng nhập đúng 5 số.\n";
        exit;
    }

    // Chuyển các số từ dạng chuỗi sang số nguyên
    $numbers = array_map('intval', $numberStrings);

    // Sắp xếp mảng số theo thứ tự tăng dần
    sort($numbers);

    // Tính tổng 4 số nhỏ nhất
    $sumOfSmallest = array_sum(array_slice($numbers, 0, 4));

    // Tính tổng 4 số lớn nhất
    $sumOfLargest = array_sum(array_slice($numbers, 1));

    // Tổng các phần tử trong mảng
    $total = array_sum($numbers);

    // Giá trị nhỏ nhất trong mảng
    $minValue = min($numbers);

    // Giá trị lớn nhất trong mảng
    $maxValue = max($numbers);

    // Các phần tử chẵn trong mảng
    $evenElements = array_filter($numbers, function ($number) {
        return $number % 2 === 0;
    });

    // Các phần tử lẻ trong mảng
    $oddElements = array_filter($numbers, function ($number) {
        return $number % 2 !== 0;
    });

    // Hiển thị kết quả
    echo "Tổng 4 số nhỏ nhất: $sumOfSmallest\n";
    echo "Tổng 4 số lớn nhất: $sumOfLargest\n";

    echo "Tổng các phần tử trong mảng: $total\n";

    echo "Giá trị nhỏ nhất trong mảng: $minValue\n";
    echo "Giá trị lớn nhất trong mảng: $maxValue\n";

    if (empty($evenElements)) {
        echo "Không có số chẵn trong mảng.\n";
    } else {
        echo "Các phần tử chẵn trong mảng: " . implode(" ", $evenElements) . "\n";
    }

    if (empty($oddElements)) {
        echo "Không có số lẻ trong mảng.\n";
    } else {
        echo "Các phần tử lẻ trong mảng: " . implode(" ", $oddElements) . "\n";
    }

?>
