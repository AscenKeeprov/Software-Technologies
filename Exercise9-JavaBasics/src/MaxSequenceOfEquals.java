import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class MaxSequenceOfEquals {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String[] input = scan.nextLine().split(" ");
        int[] nums = Arrays.stream(input).mapToInt(Integer::parseInt).toArray();
        ArrayList<String> sequence = new ArrayList<String>();
        int maxSequence = 1;
        int currentSequence = 1;
        for (int n = 1; n < nums.length ; n++) {
            if (nums[n] == nums[n - 1]){
                currentSequence++;
                if (currentSequence > maxSequence) {
                    sequence.clear();
                    for (int s = 0; s < currentSequence ; s++)
                        sequence.add(Integer.toString(nums[n]));
                    maxSequence = currentSequence;
                }
            }
            else currentSequence = 1;
        }
        System.out.println(String.join(" ", sequence));
    }
}
