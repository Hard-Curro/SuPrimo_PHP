<?php

require_once 'Connection.php';
/*
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction(); // Iniciar transacci贸n
    $products = [
        // pc parts
        ["Cable", "High-quality cable for various connections and devices", 5.99, 100, "src/cable_image", 1],
        ["Case", "Durable computer case for optimal hardware protection", 39.99, 20, "src/case_image", 1],
        ["Tower case", "Sleek tower case with ample space for components and efficient airflow", 89.99, 15, "src/tower_case_image", 1],
        ["Power supply", "Reliable power supply for consistent and stable system performance", 49.99, 30, "src/power_supply_image", 1],
        ["Plug", "Universal plug for seamless connectivity across devices", 2.99, 200, "src/plug_image", 1],
        ["Switch", "Efficient network switch for fast and reliable data transfer", 29.99, 10, "src/switch_image", 1],
        ["Optical drive", "Versatile optical drive for reading and writing discs with ease", 34.99, 25, "src/optical_drive_image", 1],
        ["Input/output adapter", "Adaptable adapter for diverse input/output needs and device compatibility", 12.99, 50, "src/io_adapter_image", 1],
        ["Expansion cards", "Enhance your system with versatile expansion cards for added functionality", 19.99, 30, "src/expansion_cards", 1],
        ["Drive connector", "Efficiently connect and transfer data with reliable drive connectors", 8.99, 50, "src/drive_connector", 1],
        ["Disk controller", "Optimize disk performance with advanced disk controllers for faster data handling", 29.99, 20, "src/disk_controller", 1],
        ["Cache", "Boost your system speed with high-capacity caches for improved performance", 14.99, 40, "src/cache", 1],
        ["DVD reader", "Enjoy high-quality DVD reading with reliable DVD readers for multimedia needs", 24.99, 15, "src/dvd_reader", 1],
        ["Fan", "Keep your system cool and efficient with powerful fans for temperature regulation", 12.99, 25, "src/fan", 1],
        ["Hard disk drive", "Store large amounts of data with reliable hard disk drives for ample storage", 59.99, 10, "src/hard_disk_drive", 1],
        ["Heat sink", "Maintain optimal temperature with effective heat sinks for heat dissipation", 9.99, 30, "src/heat_sink", 1],
        ["Motherboard", "Build a solid foundation with feature-rich motherboards for reliable computing", 89.99, 5, "src/motherboard", 1],
        ["RAM", "Boost your system's performance with high-speed RAM modules for efficient multitasking", 49.99, 15, "src/ram", 1],
        ["Sound card", "Enhance audio quality with top-notch sound cards for immersive sound experiences", 34.99, 20, "src/sound_card", 1],
        ["USB port", "Connect seamlessly with versatile USB ports for universal device compatibility", 6.99, 50, "src/usb_port", 1],
        ["Tower", "Upgrade your system with spacious and durable towers for enhanced hardware support", 79.99, 8, "src/tower", 1],
        ["Laptop", "Experience portability and power with high-performance laptops for on-the-go computing", 699.99, 3, "src/laptop", 1],

        // peripherals
        ["Monitor", "Vibrant display for an immersive visual experience", 149.99, 20, "src/monitor", 2],
        ["Mouse", "Precision and comfort in a sleek design for seamless navigation", 19.99, 50, "src/mouse", 2],
        ["Keyboard", "Responsive and ergonomic keyboard for efficient and comfortable typing", 29.99, 40, "src/keyboard", 2],
        ["USB memory", "Portable storage solution for data on the go", 14.99, 100, "src/usb_memory", 2],
        ["Controller", "Gaming controller for an immersive gaming experience", 39.99, 30, "src/controller", 2],
        ["Headphones", "High-quality headphones for an immersive audio experience", 49.99, 25, "src/headphones", 2],
        ["Microphone", "Crystal-clear microphone for voice recording and communication", 29.99, 20, "src/microphone", 2],
        ["Printer", "Versatile printer for all your printing needs", 99.99, 15, "src/printer", 2],
        ["Projector", "Compact projector for presentations and entertainment", 129.99, 10, "src/projector", 2],
        ["Remote control", "Universal remote control for convenient device management", 9.99, 50, "src/remote_control", 2],
        ["Scanner", "Efficient scanner for digitizing documents with ease", 79.99, 12, "src/scanner", 2],
        ["Speakers", "Powerful speakers for an immersive audio experience", 59.99, 18, "src/speakers", 2],
        ["Stylus", "Precision stylus for creative digital work", 12.99, 30, "src/stylus", 2],
        ["Touchscreen", "Responsive touchscreen for intuitive interactions", 89.99, 15, "src/touchscreen", 2],
        ["USB charger", "Fast and reliable USB charger for your devices", 7.99, 40, "src/usb_charger", 2],
        ["Webcam", "High-resolution webcam for clear video calls and online communication", 34.99, 25, "src/webcam", 2],
        ["Laser pointer", "Professional laser pointer for presentations and highlighting", 14.99, 35, "src/laser_pointer", 2],
        ["Alphanumeric keyboard", "Enhanced keyboard with alphanumeric layout for versatile input", 39.99, 20, "src/alphanumeric_keyboard", 2],
        ["Memory card", "High-capacity memory card for storage expansion and data backup", 17.99, 60, "src/memory_card", 2],
        ["Touchpad", "Intuitive touchpad for seamless navigation and control", 22.99, 30, "src/touchpad", 2],

        // Keys
        ["Alt key", "Versatile alt key for alternate keyboard functions", 5.99, 100, "src/alt_key", 3],
        ["Arrows", "Navigate seamlessly with responsive arrow keys", 7.99, 80, "src/arrows", 3],
        ["Backspace", "Efficient backspace key for quick corrections", 3.99, 120, "src/backspace", 3],
        ["Caps lock", "Toggle uppercase mode with the reliable caps lock key", 4.99, 90, "src/caps_lock", 3],
        ["Control", "Control key for various keyboard shortcuts", 6.99, 70, "src/control", 3],
        ["Delete", "Swift delete key for efficient content removal", 5.99, 110, "src/delete", 3],
        ["Escape", "Escape key for interrupting or canceling operations", 4.99, 85, "src/escape", 3],
        ["Function keys", "Versatile function keys for customizable actions", 9.99, 60, "src/function_keys", 3],
        ["Modifier key", "Flexible modifier key for modifying other keys' functions", 8.99, 75, "src/modifier_key", 3],
        ["Numeric keypad", "Numeric keypad for convenient numerical input", 12.99, 50, "src/numeric_keypad", 3],
        ["Enter key", "Responsive enter key for confirming input", 5.99, 95, "src/enter_key", 3],
        ["Shift key", "Shift key for accessing uppercase characters", 6.99, 65, "src/shift_key", 3],
        ["Space bar", "Spacious space bar for comfortable typing", 7.99, 80, "src/space_bar", 3],
        ["Tab", "Tab key for easy navigation between fields", 4.99, 90, "src/tab", 3],
        ["Ampersand key", "Ampersand key for typing the symbol '&'", 3.99, 100, "src/ampersand_key", 3],
        ["Apostrophe key", "Apostrophe key for typing the symbol '''", 3.99, 95, "src/apostrophe_key", 3],
        ["Asterisk key", "Asterisk key for typing the symbol '*'", 3.99, 110, "src/asterisk_key", 3],
        ["At key", "At key for typing the symbol '@'", 3.99, 120, "src/at_key", 3],
        ["Parentheses key", "Parentheses key for typing '(' and ')'", 4.99, 75, "src/parentheses_key", 3],
        ["Colon key", "Colon key for typing the symbol ':'", 3.99, 85, "src/colon_key", 3],
        ["Comma key", "Comma key for typing the symbol ','", 3.99, 100, "src/comma_key", 3],
        ["Exclamation point key", "Exclamation point key for typing '!'", 3.99, 95, "src/exclamation_point_key", 3],
        ["Period key", "Period key for typing the symbol '.'", 3.99, 110, "src/period_key", 3],
        ["Hyphen key", "Hyphen key for typing the symbol '-'", 3.99, 120, "src/hyphen_key", 3],
        ["Question mark key", "Question mark key for typing '?'", 3.99, 80, "src/question_mark_key", 3],
        ["Quotation marks key", "Quotation marks key for typing '\"'", 3.99, 90, "src/quotation_marks_key", 3],
        ["Semicolon key", "Semicolon key for typing the symbol ';'", 3.99, 100, "src/semicolon_key", 3],
        ["Slash key", "Slash key for typing the symbol '/'", 3.99, 110, "src/slash_key", 3],
        ["Underscore key", "Underscore key for typing the symbol '_'", 3.99, 85, "src/underscore_key", 3]
    ];


    $sql = "INSERT INTO products (pro_name, pro_description, price, stock, image, x_category_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($products as $product) {
        $stmt->bindParam(1, $product[0]);
        $stmt->bindParam(2, $product[1]);
        $stmt->bindParam(3, $product[2]);
        $stmt->bindParam(4, $product[3]);

        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $product[4];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        $stmt->bindParam(5, $imageData, PDO::PARAM_LOB);
        $stmt->bindParam(6, $product[5]);

        $stmt->execute();
        echo "Se ha insertado el producto con imagen: " . $product[0] . "<br>";
    }

    $pdo->commit(); // Confirmar transacci贸n

    // Cerrar la conexi贸n
    $pdo = null;
} catch (Exception $e) {
    $pdo->rollBack(); // Deshacer transacci贸n en caso de error
    echo "Error al insertar en la base de datos: " . $e->getMessage();
}
*/

/*
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction(); // Iniciar transacción
    $services = [
        ["Responsive Website Design", "Create a modern and user-friendly website tailored to your brand.", "350", "src/webDesign"],
        ["Custom Website Development", "Build a powerful and unique website with advanced features and functionalities.", "1550", "src/development"],
        ["Website Maintenance and Updates", "Ensure your website stays secure, up-to-date, and runs smoothly.", "150", "src/maintenance"],
        ["PC Performance Optimization", "Speed up your computer and enhance its overall performance for better productivity.", "80", "src/performance"],
        ["Driver and Program Installation", "Professional installation of essential drivers and software for seamless operation.", "15", "src/install"],
        ["Online Troubleshooting Services", "Get quick solutions to errors and issues affecting your online experience.", "10", "src/troubleshooting"],
        ["Expert PC Repair Services", "Comprehensive diagnostics and repairs to get your computer back in top shape.", "45", "src/repair"]
    ];

    $sql = "INSERT INTO services (ser_name, ser_description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($services as $service) {
        $stmt->bindParam(1, $service[0]);
        $stmt->bindParam(2, $service[1]);
        $stmt->bindParam(3, $service[2]);

        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $service[3];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        $stmt->bindParam(4, $imageData, PDO::PARAM_LOB);

        $stmt->execute();
        echo "Service inserted with image: " . $service[0] . "<br>";
    }

    $pdo->commit(); // Confirmar transacción

    // Cerrar la conexión
    $pdo = null;
} catch (Exception $e) {
    $pdo->rollBack(); // Deshacer transacción en caso de error
    echo "Error inserting into the database: " . $e->getMessage();
}
*/

/*
require_once '../connection/connection.php';

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction(); // Iniciar transacción
    $employees = [
        ["Marcelo", "Programmer", "Marcelo is probably the employee of the month, the only MVP", "src/marcelo"],
        ["Maria", "Web Designer", "María has an incredible taste for designs, always impressive", "src/maria"],
        ["Pablo", "Support Technician", "Pablo is the type of guy who you would trust your life, always helping others ", "src/pablo"],
        ["Jouse", "Network Administrator", "Apart from being the net admin, he's always willing to do everything", "src/jouse"],
        ["Jurado", "Help Desk Technician", "Probably the most charismatic guy at the office, always wearing cool shirts", "src/jurado"],
        ["Curro", "Software Tester", "Curro is the type of guy who is always looking forward to hanging out with you", "src/curro"],
        ["Alberto", "Data Entry Operator", "Alberto is always teleworking; people say that he has more than one marrow, what a cool guy!", "src/alberto"]
    ];

    $sql = "INSERT INTO employee (emp_name, job_title, emp_description, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($employees as $employee) {
        $stmt->bindParam(1, $employee[0]);
        $stmt->bindParam(2, $employee[1]);
        $stmt->bindParam(3, $employee[2]);

        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $employee[3];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        $stmt->bindParam(4, $imageData, PDO::PARAM_LOB);

        $stmt->execute();
        echo "Se ha insertado el servicio con imagen: " . $employee[0] . "<br>";
    }

    $pdo->commit(); // Confirmar transacción

    // Cerrar la conexión
    $pdo = null;
} catch (Exception $e) {
    $pdo->rollBack(); // Deshacer transacción en caso de error
    echo "Error al insertar en la base de datos: " . $e->getMessage();
}
*/
?>