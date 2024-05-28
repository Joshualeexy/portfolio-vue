
export function useRandomBg() {
    function randomBg() {
        const things = [
            "bg-green-300",
            "bg-blue-400",
            "bg-cyan-300",
            "bg-blue-300",
            "bg-violet-300",
            "bg-rose-300",
            "bg-pink-400",
            "bg-emerald-400	",
            "bg-yellow-300",
            "bg-orange-300",
            "bg-red-400",
            "bg-purple-300",
            "bg-yellow-500",
        ];
        const thing = things[Math.floor(Math.random() * things.length)];
        return thing;
    }
    return { randomBg };
}
