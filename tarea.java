// Version del ahorcado al 70%
import java.util.Scanner;

public class Ahorcado {

  public static void main(String[] args) {
    String ahor1 =
      " +---+ \n" +
      " |   | \n" +
      "     | \n" +
      "     | \n" +
      "     | \n" +
      "     | \n" +
      "========= ";
    String ahor2 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      "     | \n" +
      "     | \n" +
      "     | \n" +
      "========= ";
    String ahor3 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      " |   | \n" +
      "     | \n" +
      "     | \n" +
      "========= ";
    String ahor4 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      "/|   | \n" +
      "     | \n" +
      "     | \n" +
      "========= ";
    String ahor5 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      "/|\\  | \n" +
      "     | \n" +
      "     | \n" +
      "========= ";
    String ahor6 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      "/|\\  | \n" +
      "/    | \n" +
      "     | \n" +
      "========= ";
    String ahor7 =
      " +---+ \n" +
      " |   | \n" +
      " O   | \n" +
      "/|\\  | \n" +
      "/ \\  | \n" +
      "     | \n" +
      "========= ";
    String[] figuras = { ahor1, ahor2, ahor3, ahor4, ahor5, ahor6, ahor7 };
    int contador = 0;
    String letra;
    String[] palabras = {
      "programacion",
      "java",
      "identacion",
      "clases",
      "objetos",
      "desarrollador",
      "pruebas",
    };

    String palSecreta = getPalabraSecreta(palabras);
    System.out.println(figuras[0]);
    String blancos = mostrarBlancos(palSecreta);
    System.out.println(blancos);
    System.out.println("\n");
    char[] letrasPuestas = new char[6];
    while (contador < 6) {
      letra = ingreseLetra();
      Boolean esDe1Digito = letra.length() == 1;
      Boolean esRepetido = false;
      if (esDe1Digito) {
        for (char c : letrasPuestas) {
          if (c != letra.charAt(0)) {
            letrasPuestas[contador] = letra.charAt(0);
            esRepetido = false;
          } else {
            esRepetido = true;
            break;
          }
        }
      }
      String blancosActualizados = "";
      if (!esRepetido && esDe1Digito && palSecreta.indexOf(letra) != -1) {
        blancosActualizados =
          mostrarBlancosActualizados(letra, blancos, palSecreta);
        System.out.println(blancosActualizados);
        blancos = blancosActualizados;
      } else {
        System.out.println(figuras[contador]);
        System.out.println(blancosActualizados);
        contador = contador + 1;
      }

      if (blancos.equals(palSecreta)) {
        System.out.println("GANASTEEEEEEE CTM ERES EL MEJOR SIGUE ASI");
        break;
      }
    }

    System.out.println("\n");
    System.out.println(
      "ERES UN PERDEDOR DE MIERDA MALDITO HOMOSEXUAL MATATE Y SALTE DE LA CARRERA MIERDA"
    );
  }

  public static Boolean lenLetra(String letra) {
    return letra.length() == 1;
  }

  public static String getPalabraSecreta(String[] lasPalabras) {
    String palSecreta;
    int ind;
    int indiceMayor = lasPalabras.length - 1;
    int indiceMenor = 0;
    ind =
      (int) ((Math.random() * (indiceMayor - indiceMenor + 1) + indiceMenor));
    return lasPalabras[ind];
  }

  public static String mostrarBlancos(String palabra) {
    String resultado = "";
    for (int i = 0; i < palabra.length(); i++) {
      resultado += "_";
    }
    return resultado;
  }

  public static String ingreseLetra() {
    String laLetra;
    Scanner sc = new Scanner(System.in);
    System.out.println("Ingrese letra: ");
    laLetra = sc.next();
    while (laLetra.length() != 1) {
      System.out.println("Ingrese letra: "); // COMPLETAR PARA VALIDAR CARACTERES PERMITIDOS

      laLetra = sc.next();
    }
    return laLetra;
  }

  public static String mostrarBlancosActualizados(
    String letra,
    String blancos,
    String palSecreta
  ) {
    char[] palSecretaChar = palSecreta.toCharArray();
    char letraChar = letra.charAt(0);
    char[] blancosChar = blancos.toCharArray();
    for (int i = 0; i < palSecretaChar.length; i++) {
      if (palSecretaChar[i] == letraChar) {
        blancosChar[i] = letraChar;
      }
    }
    String returnar = new String(blancosChar);
    return returnar;
  }
}
