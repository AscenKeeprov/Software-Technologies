import java.util.Scanner;

public class FitStringIn20Chars {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String[] input = scan.nextLine().split("");
        StringBuilder str20Long = new StringBuilder();
        for (int i = 0; i < 20 ; i++) {
            if (i < input.length) str20Long.append(input[i]);
            else str20Long.append("*");
        }
        System.out.println(str20Long);
    }
}
