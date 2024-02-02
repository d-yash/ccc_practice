<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <style>
        table {
            border-collapse: collapse;
            width: fit-content;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Category List</h2>
    <table>
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // require 'sql/connection.php';
            // require 'sql/functions.php';
            // $conn = getDBConnection("ccc_practice");
            require '../Function/sqlFunc.php';

            $qb = new QueryBuilder();
            $qe = new QueryExecuter();
            $query = $qb->select("ccc_category", "*");
            $result = $qe->fetchAssoc($qe->execute($query));
            if ($result!=null) {
                for ($i = 0; $i < count($result); $i++) {
                    echo "
                    <tr>
                        <td>{$result[$i]['cat_id']}</td>
                        <td>{$result[$i]['name']}</td>
                        </tr>
                        ";
                }

            }
            // $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>