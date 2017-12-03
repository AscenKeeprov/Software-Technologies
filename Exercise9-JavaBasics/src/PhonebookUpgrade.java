import java.util.Map;
        import java.util.Scanner;
        import java.util.TreeMap;

public class PhonebookUpgrade {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        Map<String,String> phonebook = new TreeMap<>();
        String command = scan.nextLine();
        while (!command.toUpperCase().equals("END")) {
            String[] commandArgs = command.split(" ");
            if (commandArgs[0].toUpperCase().equals("A")) {
                String name = commandArgs[1];
                String phoneNum = commandArgs[2];
                phonebook.put(name, phoneNum);
            }
            else if (commandArgs[0].toUpperCase().equals("S")) {
                String name = commandArgs[1];
                if (phonebook.containsKey(name)) {
                    String phoneNum = phonebook.get(name);
                    System.out.println(name + " -> " + phoneNum);
                }
                else {
                    System.out.println("Contact " + name + " does not exist.");
                }
            }
            else if (commandArgs[0].toUpperCase().equals("LISTALL")) {
                for(String name : phonebook.keySet())
                {
                    String phoneNum = phonebook.get(name);
                    System.out.println(name + " -> " + phoneNum);
                }
            }
            command = scan.nextLine();
        }
    }
}
