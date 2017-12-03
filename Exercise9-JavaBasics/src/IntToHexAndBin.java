import java.util.Scanner;

public class IntToHexAndBin {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int numDec = scan.nextInt();
        String numHex = Integer.toHexString(numDec).toUpperCase();
        System.out.println(numHex);
        String numBin = Integer.toBinaryString(numDec);
        System.out.println(numBin);
    }
}
