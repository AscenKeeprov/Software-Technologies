import java.util.Arrays;
import java.util.Scanner;
import java.util.stream.IntStream;

public class EqualSums {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int[] nums = Arrays.stream(scan.nextLine().trim().split(" "))
                .mapToInt(Integer::parseInt).toArray();
        int sumLeft = 0;
        int sumRight = 0;
        boolean hasEqualSum = false;
        if (nums.length > 1) {
            for (int i = 0; i < nums.length ; i++) {
                sumLeft = IntStream.of(Arrays.copyOfRange(nums, 0, i)).sum();
                sumRight = IntStream.of(Arrays.copyOfRange(nums, i + 1, nums.length)).sum();
                if (sumLeft == sumRight) {
                    hasEqualSum = true;
                    System.out.println(i);
                }
            }
            if (!hasEqualSum) System.out.println("no");
        }
        else System.out.println(0);
    }
}
