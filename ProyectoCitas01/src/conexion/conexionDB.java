
package conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class conexionDB {

    private static final String URL = "jdbc:mysql://localhost:3306/dbcitas";
    private static final String USER = "root";
    private static final String PASSWORD = "12345678";

    // Constructor privado para evitar la creación de instancias
    private conexionDB() {}

    public static Connection getConexion() {
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(URL, USER, PASSWORD);
            System.out.println("la conexion se extablecio cotrecamente");
        } catch (SQLException e) {
            System.err.println("Error al conectar a la base de datos: " + e.getMessage());
        }
        return conn;
    }
}
