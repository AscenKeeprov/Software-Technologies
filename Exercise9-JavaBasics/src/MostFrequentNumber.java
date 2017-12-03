import java.util.Arrays;
        import java.util.Scanner;

public class MostFrequentNumber {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String[] input = scan.nextLine().trim().split(" ");
        int[] nums = Arrays.stream(input).mapToInt(Integer::parseInt).toArray();
        int currentCount = 0;
        int topCount = 0;
        int topNum = 1337;
        for (int i = 0; i < nums.length ; i++) {
            int currentNum = nums[i];
            for (int n = 0; n < nums.length ; n++)
                if(nums[n] == currentNum) currentCount++;
            if (currentCount > topCount) {
                topNum = currentNum;
                topCount = currentCount;
            }
            nums = Arrays.stream(nums).filter(e -> e != currentNum).toArray();
            currentCount = 0;
        }
        System.out.println(topNum);
    }
}
