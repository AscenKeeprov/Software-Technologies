import java.util.Scanner;

public class VarInHexFormat {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String numHex = scan.nextLine();
        int numDec = Integer.parseInt(numHex, 16);
        System.out.println(numDec);
    }
}
