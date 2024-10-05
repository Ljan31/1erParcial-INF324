package impuesto;

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 *
 * @author LIMBERG
 */
@WebServlet(name = "ImpuestoServlet", urlPatterns = {"/ImpuestoServlet"})
public class ImpuestoServlet extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ImpuestoServlet</title>");
            out.println("<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>");
            out.println("</head>");
            out.println("<body>");
            out.println("<div class='bg-primary text-white text-center py-3'>");
            out.println("<h1>Municipio de La Paz HAM-LP</h1>");
            out.println("</div>");
            out.println("<div class='container mt-4'>");

            // Obtener el parámetro "id"
            String idParam = request.getParameter("id");
            String mensaje = "";

            if (idParam != null) {
                try {
                    // Extraer el primer carácter y convertirlo a entero
                    int tipo = Integer.parseInt(String.valueOf(idParam.charAt(0)));

                    // Comparar el primer valor
                    switch (tipo) {
                        case 1:
                            mensaje = "Impuesto alto.";
                            break;
                        case 2:
                            mensaje = "Impuesto medio.";
                            break;
                        case 3:
                            mensaje = "Impuesto bajo.";
                            break;
                        default:
                            mensaje = "Código de impuesto no válido.";
                    }
                } catch (NumberFormatException e) {
                    mensaje = "El valor proporcionado no es un número válido.";
                } catch (StringIndexOutOfBoundsException e) {
                    mensaje = "No se ha proporcionado un ID válido.";
                }
            } else {
                mensaje = "No se ha proporcionado un ID.";
            }

            // Imprimir el mensaje (puedes mostrarlo en la página o en el log)
            System.out.println(mensaje);

            // Mostrar el mensaje en la página
            out.println("<h2> ID: " + idParam +" - "+ mensaje + "</h2>");
            out.println("</div>");
            out.println("<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }
}
